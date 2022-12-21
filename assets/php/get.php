<?php

// komut foto ise foto linkini al
if (isset($_REQUEST["foto"])){
    $url= 'https://picsum.photos/1080/1080';   // picsum sitesi generic foto linki
    
    // picsum sitesinden generic foto linkini sabit foto linkine çevirir
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    curl_close($ch);
    $redirectURL = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    
    echo $redirectURL;
}
    
// logo resim - giris dosya seçilirse indir
if (isset($_FILES["file"]["name"])) {
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../".$_FILES["file"]["name"]);
    echo $_FILES["file"]["name"];
}

// bir istem yoksa çıkış yap
if (!isset($_REQUEST['q'])) {
    exit();
}

// sahibinden sorgusu isteniyorsa yap
if ($_REQUEST['q'] == "sahibinden") {
    $p = $_REQUEST['p'];
    //p=no ise url getir
    if (is_numeric($p)) {
        $url = 'https://www.sahibinden.com/kelime-ile-arama?query_text='.$p;
    } else {
        $url = $p;
    }
    // url sayfasindaki bilgileri getir
    $sahibinden = sahibindenBilgileriGetir($url);
    //bilgileri gönder
    echo json_encode($sahibinden, JSON_UNESCAPED_UNICODE);
}

// parselSorgu il listesi
if ($_REQUEST['q'] == "parselSorguIlListesi") {
    $illerJson = parselSorguURL("https://parselsorgu.tkgm.gov.tr/app/modules/administrativeQuery/data/ilListe.json");
    $ilveKoduArray = parselSorguArrayGetir($illerJson);
    echo json_encode($ilveKoduArray, JSON_UNESCAPED_UNICODE);
}

// parselSorgu ilce listesi
if ($_REQUEST['q'] == "parselSorguIlceListesi") {
    $parselSorguIlNo = $_REQUEST['p'];
    $ilcelerJson = parselSorguURL("https://cbsapi.tkgm.gov.tr/megsiswebapi.v3/api//idariYapi/ilceListe/" . $parselSorguIlNo);
    $ilceveKoduArray = parselSorguArrayGetir($ilcelerJson);
    echo json_encode($ilceveKoduArray, JSON_UNESCAPED_UNICODE);
}

// parselSorgu mahalle listesi
if ($_REQUEST['q'] == "parselSorguMahalleListesi") {
    $parselSorguIlceNo = $_REQUEST['p'];
    $mahallelerJson = parselSorguURL("https://cbsapi.tkgm.gov.tr/megsiswebapi.v3/api/idariYapi/mahalleListe/" . $parselSorguIlceNo);
    $mahalleveKoduArray = parselSorguArrayGetir($mahallelerJson);
    echo json_encode($mahalleveKoduArray, JSON_UNESCAPED_UNICODE);
}

// parselSorgu sorgulama
if ($_REQUEST['q'] == "parselSorgu") {
    $parselSorguMahalleNo   = $_REQUEST['mahalleNo'];
    $parselSorguAdaNo       = $_REQUEST['adaNo'];
    $parselSorguParselNo    = $_REQUEST['parselNo'];
    $parselSorguBilgilerJson = parselSorguURL("https://cbsapi.tkgm.gov.tr/megsiswebapi.v3/api/parsel/$parselSorguMahalleNo/$parselSorguAdaNo/$parselSorguParselNo");
    $parselSorguBilgilerArray = parselSorguBilgilerArrayGetir($parselSorguBilgilerJson);
    echo json_encode($parselSorguBilgilerArray, JSON_UNESCAPED_UNICODE);
}

// sahibinden.com sayfasını getir
function sahibindenURL($url){ 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEFILE, realpath('cookieSahibinden.txt'));
    curl_setopt($ch, CURLOPT_COOKIEJAR, realpath('cookieSahibinden.txt'));
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $headers = array();
    $headers[] = 'Authority: www.sahibinden.com';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Sec-Ch-Ua: \"Not?A_Brand\";v=\"8\", \"Chromium\";v=\"108\", \"Google Chrome\";v=\"108\"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: none';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {echo 'Error:' . curl_error($ch);}
    curl_close($ch);
    $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    return $result;
}

//link sayfasındaki bilgileri ayırır
function sahibindenBilgileriGetir($url){ 

    //sayfayı al
    $result = sahibindenURL($url);


    //bilgileri ayır
    $sahibinden = array();

    preg_match_all('@<h1>(.*?)</h1>@si', $result, $baslik);
    $baslik = $baslik[1][0];
    $sahibinden["baslik"] = $baslik;

    preg_match_all('@data-json="(.*?)">@si', $result, $data);
    $data = $data[1][0];
    $data = str_replace("&quot;", '"', $data);
    $data = json_decode($data);
    $data = $data -> customVars;

    //bilgileri array yap
    foreach ($data as $value) {
        $value = (array)$value;
        $sahibinden[$value["name"]] = $value["value"];
    }

    //gönder
    return $sahibinden;
}

// parselSorgu sayfasını getir
function parselSorguURL($url){  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}

function parselSorguArrayGetir($sorguJson){
    $sorguJson = (array)json_decode($sorguJson);
    $sorguJson = (array) $sorguJson["features"];
    $sorguArray = array();
    foreach ($sorguJson as $value) {
        $value = (array) $value;
        $value = $value["properties"];
        $value = (array) $value;
        array_push($sorguArray, $value);
    }
    return $sorguArray;
}

function parselSorguBilgilerArrayGetir($sorguJson){
    if (str_contains($sorguJson, "Message")) {
        return array("Hata" => "Hata var, kontrol ediniz");
    }
    $sorguJson = (array)json_decode($sorguJson);
    $sorguArray = (array) $sorguJson["properties"];
    return $sorguArray;
}
