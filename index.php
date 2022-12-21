<!-- 
InstaGonderi
Instagram paylaşımları için gönderi boyutlarında resim hazırlar
=> sahibinden.com'dan bilgi alma
=> parselsorgu.com'dan bilgi alma
=> logo ve yazı ekleme
=> resim kaydetme

nmelihkutlu tarafından yazılmıştır
https://www.r10.net/profil/169602-nmelihkutlu.html
-->

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - InstaGönderi</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Custon Js -->
    <script src="assets/js/script.js"></script>
</head>

<body onload=sayfaAcilinca()>

    <!-- header -->
    <header class="container">
        <div class="py-5 text-center">
            <img width="100" class="d-block mx-auto mb-4" src="assets/images/logo.png" alt="logo">
            <h2>Demo InstaGonderi - Emlakçı</h2>
            <p class="lead">Instagram için gönderi resmi hazırlama scripti</p>
            <a href="assets/kullanimklavuzu/kullanimklavuzu.html">Kullanım Klavuzu</a>
            <a href="assets/kullanimklavuzu/teknik.html">Teknik Bilgiler</a>
        </div>
    </header>
    <hr>

    <!-- Bilgi Girişleri (3 column) Start -->
    <section class="container">
        <div class="row align-items-start">

            <!-- Bilgiler -->
            <div class="col">
                <h3>Bilgiler:</h3>
                <form>
                    <div class="mb-3 ">
                        <img class="d-block mx-auto" id="bilgilerLogo" height="50" src="logo.png" alt="Logo">
                        <label for="bilgiLogoLink" class="form-label">Logo Link</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bilgiLogoLink">
                            <div class="input-group-text btn btn-primary" id="" onclick="changeLogo($('#bilgiLogoLink').val())">Link Kaydet</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Logo Yükle</label>
                        <input class="form-control" type="file" id="file">
                    </div>
                    <div class="mb-3">
                        <label for="bilgiAdi" class="form-label">Ad / Firma</label>
                        <input type="text" class="form-control" id="bilgiAdi">
                    </div>
                    <div class="mb-3">
                        <label for="bilgiTel" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="bilgiTel">
                    </div>
                </form>
            </div>

            <!-- Sahibinden -->
            <div class="col">
                <h3>Sahibinden</h3>
                <form>
                    <div class="mb-3">
                        <label for="sahibinden" class="form-label">Sahibinden Link (veya İlan No):</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="sahibinden">
                            <div class="input-group-text btn btn-primary" onclick="sahibindenSorgu()" id="">Sorgula</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="infoSahibinden" class="form-label">Sahibinden.com Bilgileri:</label>
                        <textarea rows="10" class="form-control" id="infoSahibinden" placeholder="Sorgulanan bilgiler burada gözükecektir..."></textarea>
                    </div>
                </form>
            </div>

            <!-- ParselSorgu -->
            <div class="col">
                <h3>Parsel Sorgu</h3>
                <form>
                    <div class="mb-3">
                        <select class="form-select" id="secIl" onchange="parselSorguIlceListesi()">
                            <option selected>İl</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="secIlce" onchange="parselSorguMahalleListesi()">
                            <option selected>İlçe</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="secMahalle">
                            <option selected>Mahalle</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="adaNo" placeholder="Ada yazınız...">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="parselNo" placeholder="Parsel yazınız...">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" onclick="parselSorgu()">Sorgula</button>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ParselSorgu Bilgileri:</label>
                        <textarea rows="3" class="form-control" id="infoParselSorgu" placeholder="Sorgulanan bilgiler burada gözükecektir..."></textarea>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <br>
    <hr>

    <!-- gönderi hazırlık -->
    <section class="container">
        <div class="row align-items-start">

            <!-- Gönderi Metni -->
            <div class="col">
                <h2>Gönderi Metni</h2>
                <div class="mb-3">
                    <label for="gonderiMetni" class="form-label">Yer Alacak Metinler:</label>
                    <textarea rows="10" cols="35" class="form-control text-center" id="gonderiMetni" placeholder="Gönderide yer alacak metinler burada gözükecektir, el ile düzeltme yapabilirsiniz..." onchange="changeGonderiMetni()">Sahibinden Satılık&#10;Süper Fırsat Daire&#10;Manisa / Turgutlu / Şehitler Mah.&#10;3+1 120 m2&#10;950.000 TL</textarea>
                </div>
            </div>

            <!-- Gönderi Resmini Seç -->
            <div class="col">
                <h2>Gönderi Resmini Seç</h2>
                <form>
                    <!-- Resim Link -->
                    <div class="mb-3 ">
                        <label for="resimLink" class="form-label">Resim Link</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="resimLink">
                            <div class="input-group-text btn btn-primary" id="" onclick='degistirGonderiResmiOnizleme($("#resimLink").val())'>Kaydet</div>
                        </div>
                    </div>

                    <!-- Resim Yükle -->
                    <div class="mb-3">
                        <label for="fileResim" class="form-label">Resim Yükle</label>
                        <input class="form-control" type="file" id="fileResim">
                    </div>
                    <!-- Rastgele Resim -->
                    <div class="mb-3">
                        <label for="buttonFotoDegistir" class="form-label">Rastgele bir resim için tıklayınız</label>
                        <button type="button" class="form-control btn btn-primary" id="buttonFotoDegistir" onclick="getPicsumFoto()">Rastgele Resim</button>
                    </div>
                    <!-- Hazır Resimler -->
                    <div class="mb-3">
                        <label for="" class="form-label">Hazır Resimler</label>
                        <div class="input-group" style="cursor:pointer;">
                            <img class="form-control" src="assets/images/background1.png" alt="Hazır Resim" onclick="degistirGonderiResmiOnizleme(this.src)">
                            <img class="form-control" src="assets/images/background2.png" alt="Hazır Resim" onclick="degistirGonderiResmiOnizleme(this.src)">
                            <img class="form-control" src="assets/images/background3.png" alt="Hazır Resim" onclick="degistirGonderiResmiOnizleme(this.src)">
                            <img class="form-control" src="assets/images/background4.png" alt="Hazır Resim" onclick="degistirGonderiResmiOnizleme(this.src)">
                        </div>
                    </div>

                </form>
            </div>

            <!-- Gönderi Resmini Gör -->
            <div class="col">
                <h2>Gönderi Resmi (Arka plan)</h2>
                <div class="mb-3">
                    <img class="img-fluid" id="backgroundY" src="assets/images/PlaceHolder1080x1080.png" alt="Yatay resim arka planı" crossorigin="anonymous">
                </div>
            </div>
            <a id="linkKaydetY"></a>
    </section>

    <br>
    <hr>

    <!-- gonderi -->
    <section class="container">
        <div class="py-5 text-center">
            <h2>Resim (1080x1080 Gönderi Boyutu)</h2>
            <div class="btn-group-lg" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary" onclick="canvasTemizle()">Temizle</button>
                <button type="button" class="btn btn-primary" onclick="canvasBackgroundDegistir()">Resmi Ekle</button>
                <button type="button" class="btn btn-primary" onclick="canvasBilgiler()">Yazı Ekle</button>
                <button type="button" class="btn btn-primary" onclick="canvasKaydet()">Resmi Kaydet</button>
            </div>
        </div>
        <div class="row align-items-start">
            <!-- Instagram gönderi  : 1080 x 1080 px olmalıdır. -->
            <!-- Instagram dikey fotoğraf: 1080 x 1920 px olmalıdır -->
        </div>
    </section>

    <!-- canvas -->
    <center>
        <canvas id="canvasY" width="1080" height="1080" style="border:1px solid #c3c3c3;"></canvas>
    </center>


    <!-- footer -->
    <footer class="container pt-5 mt-5">
        <div class="py-5 mt-5 text-muted text-center text-small">
            <img src="assets/images/nmelihkutlu.jpg" alt="nmelihkutlu" style="border-radius: 50%;" width="100">
            <p>
                nmelihkutlu tarafından hazırlanmıştır<br>
                <a href="https://www.r10.net/profil/169602-nmelihkutlu.html">https://www.r10.net/profil/169602-nmelihkutlu.html</a>
            </p>
        </div>
    </footer>

<script>

//canvas temizler
function canvasTemizle(){
    let canvas = document.getElementById('canvasY')
    let ctx = canvas.getContext('2d')
    ctx.clearRect(0, 0, canvas.width, canvas.height)
}

// sayfa yüklenince burası otomatik çalışır
function sayfaAcilinca() {
    //Kayıtlı bilgileri kontrol et
    if (localStorage.getItem("logo") === null) { localStorage.setItem("logo", "logo.png") }
    document.getElementById("bilgiLogoLink").value = localStorage.getItem("logo")

    if (localStorage.getItem("bilgiAdi") === null) { localStorage.setItem("bilgiAdi", "Firma Adı") }
    document.getElementById("bilgiAdi").value = localStorage.getItem("bilgiAdi")

    if (localStorage.getItem("bilgiTel") === null) { localStorage.setItem("bilgiTel", "0 (555) 123 45 67") }
    document.getElementById("bilgiTel").value = localStorage.getItem("bilgiTel")

    if (localStorage.getItem("sahibinden") === null) { localStorage.setItem("sahibinden", "https://www.sahibinden.com/ilan/emlak-konut-satilik-turgutlu-da-caddeye-yakin-acil-satilik-3-plus1-daire-1066173094/detay") }
    document.getElementById("sahibinden").value = localStorage.getItem("sahibinden")

    if (localStorage.getItem("gonderiMetni") !== null) {
        document.getElementById("gonderiMetni").value = localStorage.getItem("gonderiMetni")
    }

    if (localStorage.getItem("resimLink") !== null) {
        document.getElementById("resimLink").value = localStorage.getItem("resimLink")
        degistirGonderiResmiOnizleme(localStorage.getItem("resimLink"))
    }

    //İl listesini al ve ilgili yeri güncelle
    parselSorguIlListesi()
}

//rastgele resim üretir ve linkini getirir
function getPicsumFoto() {
    $.ajax({
        url: "assets/php/get.php?foto",
        type: "GET",
        success: function (result) {
            degistirGonderiResmiOnizleme(result)
        }
    });
}

//canvas bilgileri yazar
function canvasBilgiler() {
    var canvas = document.getElementById('canvasY');
    var ctx = canvas.getContext('2d');

    // logo
    var img = new Image();
    img.onload = drawLogo.bind(null, img, ctx);

    function drawLogo(img, ctx) {
        var canvas = ctx.canvas
        var hRatio = 200 / img.width
        var vRatio = 200 / img.height
        var ratio = Math.min(hRatio, vRatio)
        var centerShift_x = (canvas.width - img.width * ratio) / 2
        var centerShift_y = canvas.height - 300
        ctx.drawImage(img, 0, 0, img.width, img.height, centerShift_x, centerShift_y, img.width * ratio, img.height * ratio)
    }
    img.src = document.getElementById("bilgilerLogo").src

    // yazı ayarları
    ctx.font = "50px Arial";
    ctx.textAlign = "center";
    ctx.fillStyle = "black";
    ctx.strokeStyle = "white";
    // ctx.shadowBlur = 3;
    // ctx.shadowColor = "#000000";
    // ctx.shadowOffs = 0;                 
    ctx.lineWidth = 2;

    //isim ve telefon
    var t = document.getElementById("bilgiAdi").value + " / " + document.getElementById("bilgiTel").value
    var x = (canvas.width / 2)
    var y = canvas.height - 100
    ctx.fillText(t, x, y);

    //bilgiler metin

    var lines = document.getElementById("gonderiMetni").value.split("\n");

    // her bir satır için ayrı ayrı yazı metnini canvas'a yazın
    for (var i = 0; i < lines.length; i++) {
        var t = lines[i]
        var x = (canvas.width / 2)
        var y = (440 - (((lines.length * 50) + ((lines.length - 1) * 20)) / 2)) + i * (50 + 20)
        ctx.fillText(t, x, y); // yazı metni, x ve y koordinatları
    }
}

function canvasBackgroundDegistir() {
    var c = document.getElementById("canvasY");
    var ctx = c.getContext("2d");
    var img = document.getElementById("backgroundY");
    ctx.drawImage(img, 0, 0);
}

function canvasKaydet() {
    let link = document.getElementById('linkKaydetY');
    link.setAttribute('download', 'Gonderi.png');
    link.setAttribute('href', canvasY.toDataURL("image/png"));
    link.click();
}
    
//logo yükleme tuşuna basılınca logo yükle
$(document).on('change', '#file', function () {
    var name = document.getElementById("file").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['png']) == -1) {
        alert("Logo dosyası (png) seçiniz!");
    } else {

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        var f = document.getElementById("file").files[0];
        var fsize = f.size || f.fileSize;
        if (fsize > 1000000) {
            alert("Resim çok büyük!");
        } else {
            form_data.append("file", document.getElementById('file').files[0]);
            $.ajax({
                url: "assets/php/get.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    alert(data + " yüklendi.")
                    changeLogo(data)
                }
            });
        }
    }
});

// change logo(link)
function changeLogo(data) {
    localStorage.setItem("logo", data)
    document.getElementById("bilgiLogoLink").value = data
    document.getElementById("bilgilerLogo").src = data
    document.getElementById("resimLogo").src = data
}

//resim yükleme tuşuna basılınca resim yükle
$(document).on('change', '#fileResim', function () {
    var name = document.getElementById("fileResim").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['png']) == -1) {
        alert("Resim dosyası (png) seçiniz!");
    } else {

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileResim").files[0]);
        var f = document.getElementById("fileResim").files[0];
        var fsize = f.size || f.fileSize;
        if (fsize > 1000000) {
            alert("Resim çok büyük!");
        } else {
            form_data.append("file", document.getElementById('fileResim').files[0]);
            $.ajax({
                url: "assets/php/get.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    alert(data + " yüklendi.")
                    degistirGonderiResmiOnizleme(data)
                }
            });
        }
    }
});

//gönderi resmi önizleme ve ayarları
function degistirGonderiResmiOnizleme(gonderiResmiLink) {
    localStorage.setItem("resimLink", gonderiResmiLink)
    document.getElementById("resimLink").value = gonderiResmiLink
    document.getElementById("backgroundY").src = gonderiResmiLink
}

// sahibinden sayfasından bilgilerini getir
function sahibindenSorgu() {
    localStorage.setItem("sahibindenLink", document.getElementById("sahibinden").value)
    $.ajax({
        url: "assets/php/get.php",
        type: "POST",
        data: {
            q: "sahibinden",
            p: document.getElementById('sahibinden').value
        },
        success: function (result) {
            window.liste = JSON.parse(result)
            var infoSahibinden = document.getElementById("infoSahibinden")
            infoSahibinden.innerHTML = ''
            Object.entries(liste).forEach(([key, value]) => {
                infoSahibinden.innerHTML += key + ' = ' + value + '&#10;'
            })

            var selectIl = document.getElementById("secIl")
            for (var i = 0; i < selectIl.options.length; i++) {
                if (selectIl.options[i].text === liste["loc2"]) {
                    selectIl.selectedIndex = i
                    parselSorguIlceListesi()
                    break
                }
            }

            

            if (typeof liste["Ada No"] !== 'undefined') {
                document.getElementById("adaNo").value = liste["Ada No"]
            }
            if (typeof liste["Parsel No"] !== 'undefined') {
                document.getElementById("parselNo").value = liste["Parsel No"]
            }
        }
    });
}

// change bilgiAdi
function changeBilgiAdi() {
    localStorage.setItem("bilgiAdi", document.getElementById("bilgiAdi").value)
}

// change bilgiTel
function changeBilgiTel() {
    localStorage.setItem("bilgiTel", document.getElementById("bilgiTel").value)
}

// change gonderiMetni
function changeGonderiMetni() {
    localStorage.setItem("gonderiMetni", document.getElementById("gonderiMetni").value)
}

// parselSorgu il listesi bilgilerini getirir
function parselSorguIlListesi() {
    $.ajax({
        url: "assets/php/get.php",
        type: "POST",
        data: {
            q: "parselSorguIlListesi"
        },
        success: function (result) {
            var listeIl = JSON.parse(result);
            var selectIl = document.getElementById("secIl");
            selectIl.innerHTML = '<option value="-3">İl Seçiniz:</option>'
            listeIl.forEach((element) => {
                selectIl.innerHTML += '<option value="' + element['id'] + '">' + element['text'] + '</option>'
            })
        }
    });
}

// parselSorgu ilce listesi bilgilerini getirir
function parselSorguIlceListesi() {
    var il = document.getElementById("secIl").value;
    $.ajax({
        url: "assets/php/get.php",
        type: "POST",
        data: {
            q: "parselSorguIlceListesi",
            p: il
        },
        success: function (result) {
            var listeIlce = JSON.parse(result);
            var selectIlce = document.getElementById("secIlce");
            selectIlce.innerHTML = '<option value="-3">İlçe Seçiniz:</option>'
            listeIlce.forEach((element) => {
                selectIlce.innerHTML += '<option value="' + element['id'] + '">' + element['text'] + '</option>'
            })

            if (typeof liste !== 'undefined') {
                if (liste["loc3"] != "...") { // eğer sahibinden değer varsa seç
                    for (var i = 0; i < selectIlce.options.length; i++) {
                        if (selectIlce.options[i].text === liste.loc3) {
                            selectIlce.selectedIndex = i
                            parselSorguMahalleListesi()
                            break;
                        }
                    }
                }
            }
        }
    });
}

// parselSorgu mahalle listesi bilgilerini getirir
function parselSorguMahalleListesi() {
    var ilce = document.getElementById("secIlce").value;
    $.ajax({
        url: "assets/php/get.php",
        type: "POST",
        data: {
            q: "parselSorguMahalleListesi",
            p: ilce
        },
        success: function (result) {
            var listeMahalle = JSON.parse(result);
            var selectMahalle = document.getElementById("secMahalle");
            selectMahalle.innerHTML = '<option value="-3">Mahalle Seçiniz:</option>'
            listeMahalle.forEach((element) => {
                selectMahalle.innerHTML += '<option value="' + element['id'] + '">' + element['text'] + '</option>'
            })

            if (typeof liste !== 'undefined') {
                liste.loc5 = liste.loc5.replace(" Mh.","")
                if (liste.loc5 != "...") { // eğer sahibinden değer varsa seç
                    for (var i = 0; i < selectMahalle.options.length; i++) {
                        if (selectMahalle.options[i].text === liste.loc5) {
                            selectMahalle.selectedIndex = i
                            break;
                        }
                    }
                }
            }



        }
    });
}

// parselSorgu sayfasından bilgilerini getir
function parselSorgu() {
    $.ajax({
        url: "assets/php/get.php",
        type: "POST",
        data: {
            q: "parselSorgu",
            mahalleNo: document.getElementById('secMahalle').value,
            adaNo: document.getElementById('adaNo').value,
            parselNo: document.getElementById('parselNo').value
        },
        success: function (result) {
            window.listeParsel = JSON.parse(result)
            var infoParselSorgu = document.getElementById("infoParselSorgu")
            infoParselSorgu.innerHTML = ''
            Object.entries(listeParsel).forEach(([key, value]) => {
                infoParselSorgu.innerHTML += key + ' = ' + value + '&#10;'
            })
            aktarParselSorgu()
        }
    });
}

//parselsorgu bilgilerini gönderi metnine aktarır
function aktarParselSorgu() {
    var gonderiMetni = document.getElementById("gonderiMetni")
    gonderiMetni.innerHTML = ''
    gonderiMetni.innerHTML += listeParsel.ilAd + '&#10;'
    gonderiMetni.innerHTML += listeParsel.ilceAd + " - " + listeParsel.mahalleAd + '&#10;'
    gonderiMetni.innerHTML += "Ada: " + listeParsel.adaNo + " - " + "Parsel: " + listeParsel.parselNo + '&#10;'
    gonderiMetni.innerHTML += "Tapu Alanı: " + listeParsel.alan + '&#10;'
    gonderiMetni.innerHTML += "Nitelik: " + listeParsel.nitelik + '&#10;'
    gonderiMetni.innerHTML += "Mevkii: " + listeParsel.mevkii + '&#10;'
    gonderiMetni.innerHTML += "Zemin Tip: " + listeParsel.zeminKmdurum + '&#10;'
}
</script>

</body>

</html>