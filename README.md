# Instagram Gönderi Resmi Hazırlama Scripti

**Emlakcı Versiyonu**

İnstagram gönderi hazırlama scriptidir. sahibinden ve parselsorgu sitelerinden otomatik sorgulama yaparak 1080x1080 boyutlarında gönderi resmi oluşturur.

![](https://raw.githubusercontent.com/nmelihkutlu/instagramGonderiHazirlamaEmlakciDemo/main/assets/kullanimklavuzu/EkranGoruntusu1.png)

## Bilgiler:
Logo, firma, telefon gibi genel bilgilerin girişi yapılır.

**Logo Link:** Herhangi bir internet sayfasındaki logo dosyanın linkini yazabilirsiniz.

**Logo Yükle:** "Dosya Seç" butonuna tıklayarak, bilgisayarınızdaki herhangi bir logo dosyasını yükleyebilirsiniz.

**Ad / Firma:** "İsim veya Firma bilgisini yazabilirsiniz.

**Telefon:** Telefon numarasını yazabilirsiniz.

**Bir değişiklik yapıldığında hafızaya alınır ve sayfayı bir sonraki çalıştırmanızda otomatik olarak bilgiler gelir.**

## Sahibinden:

Burada "sahibinden.com" sorgulaması yapabilirsiniz. İlgili sayfadaki tüm bilgiler gelecektir.

**Sahibinden Link (veya İlan No):** sahibinden.com sitesindeki linki kopyalayıp buraya yapıştırın. İsterseniz ilan no da yazabilirsiniz.

**Sorgula:** "Sorgula" tuşuna bastığınızda sahibinden.com ilgili sayfasından tüm bilgileri çeker.

**Sahibinden.com Bilgileri:** Bilgiler burada gözükecektir.

**Sorgulama yapıldığında, yandaki parselsorgu alanı otomatik olarak güncellenir.**

## Parsel Sorgu
Burada "parselsorgu.tkgm.gov.tr" sorgulaması yapabilirsiniz. İlgili sayfadaki bilgiler gelecektir.

**İl Seçiniz:** İl bilgisi yüklenince seçim yapabilirsiniz.

**İlçe Seçiniz:** İl seçilince aktif olur, ilçeyi seçebilirsiniz.

**Mahalle Seçiniz:** İlçe seçilince aktif olur, mahalleyi seçebilirsiniz.

**Ada yazınız...** Ada numarasını yazınız.

**Parsel yazınız...** Parsel numarasını yazınız.

**Sorgula:** "Sorgula" tuşuna bastığınızda "parselsorgu.tkgm.gov.tr" sayfasından sorgulama yapılır.

**ParselSorgu Bilgileri:** Sorgulama sonucu burada gözükecektir.

![](https://raw.githubusercontent.com/nmelihkutlu/instagramGonderiHazirlamaEmlakciDemo/main/assets/kullanimklavuzu/EkranGoruntusu2.png)

## Gönderi Metni
Gönderi resmi üzerinde yer alacak metin burada ayarlanır.

**Yer Alacak Metinler:** Sorgulama sonuçları gösterilir. Bu metni istediğiniz gibi değiştirebilirsiniz.

**Bu metni istediğiniz gibi değiştirebilirsiniz.**

## Gönderi Resmini Seç
Gönderi resmi (yazıların arkasında görülen arka plan resmi) burada ayarlanır.

**Resim Link:** Herhangi bir internet sayfasındaki resim dosyanın linkini yapıştırabilirsiniz.

**Resim Yükle:** "Dosya Seç" butonuna tıklayarak, bilgisayarınızdaki herhangi bir resim dosyasını yükleyebilirsiniz. Gönderi boyutunda olmasına dikkat ediniz. (1080x1080)

**Rastgele Resim:** Butona tıkladığınızda picsum sitesinden rastgele bir resim getirir.

**Hazır Resimler:** Tıkladığınız resim gönderi resmi olarak seçilir. Kendi dizayn ettiğiniz ve her zaman kullanacağınız resimleri buraya koyabilirsiniz.

**Kendi dizayn ettiğiniz 4 resmi kullanmak için: Resimleri "assets/images" klasörüne "background1.png" .. "background4.png" olarak kaydedebilirsiniz.**

## Gönderi Resmi (Arka plan)
Gönderi arka plan resmi burada gözükecektir.

![](https://raw.githubusercontent.com/nmelihkutlu/instagramGonderiHazirlamaEmlakciDemo/main/assets/kullanimklavuzu/EkranGoruntusu3.png)

## Resim (1080x1080 Gönderi Boyutu)

Metin ve resim birleştirilerek gönderi oluşturulur ve bilgisayara kaydedilir.

**Temizle:** Gönderi alanı temizlenir, sıfırlanır.

**Resmi Ekle:** Üst kısımda seçilen resim gönderiye eklenir.

**Yazı Ekle:** Üst kısımda hazırlanan yazı gönderiye eklenir. Logo ve bilgiler otomatik olarak gelecektir.

**Resmi Kaydet:** Hazırlanan gönderi, resim dosyası olarak bilgisayara kaydedilir.

**"Yazı Ekle"** butonuna her bastığınızda yazılı kalın (bold) hale getirir.

# Kullanılan Dil ve yöntemler:
**HTML + CSS:** İskelet oluşturuldu.

**Bootstrap:** Görünüm daha güzel hale getirildi.

**JavaScript:** İstemci tarafındaki kodlamalar yapıldı. Örneğin: Sayfa yüklenince il sorgulaması yapılması istemi veya canvas ile resmin oluşturulması gibi.

**JQuery:** Bazı kodların daha kolay yazılması için kullanıldı. Örneğin ajax işlemleri.

**Ajax:** Sayfa yenilenmeden bilgilerin gelmesi için kullanıldı.

**PHP:** Server tabanlı kodlamalar yapıldı. Örneğin: sahibinden sorgulaması, picsum resim linkinin alınması gibi.

**Curl:** Başka internet sayfalarından bilgi almak için http istemci olarak kullanıldı.

**HTML Canvas:** Sayfa içinde resim oluşturmak / çizim yapmak için kullanıldı.

# Yöntemler:
**Sahibinden.com Sorgulama:** Curl ile yapıldı. Cookie ve ilgili ayarlar yapılarak bot tespit sistemi atlandı. Tek sorgulama olduğu için proxy ve diğer şeylere gerek duyulmadı.

**Sahibinden.com Link/No?:** Girilen bilgi, PHP "is_numeric()" komutu ile kontrol edilerek no/link olduğu tespit edildi ve ilgili sayfadan sorgulama yapıldı.

**Sahibinden.com Bilgileri:** Gelen sayfa incelendiğinde tüm bilgilerin json olarak mevcut olduğu görüldü, tek tek almak yerine json bilgisi alındı.

**ParselSorgu Sorgulama:** Önce il sorgulandı. İl bilgisi gelmeden olmadan ilçe bilgisi gelmediği için il-ilçe-mahalle bilgileri sıra ile alındı.

**ParselSorgu Sorgulama:** Önce il sorgulandı. İl bilgisi gelmeden olmadan ilçe bilgisi gelmediği için il-ilçe-mahalle bilgileri sıra ile alındı.

**Bilgilerin Kaydedilmesi:** Local Storage kullanıldı. Her kullanıcının kendi bilgisayına kayıt yapıldı.

**Değişiklik Olduğunda Kayıt:** Başka bir tuşa basmaya gerek kalmadan, değişiklik olduğu an kayıt olması için "$(document).on('change', '#fileResim', function ()" gibi komutlar kullanıldı.

**Rastgele Resimler:** Görsel olarak güzelleştirmek için picsum sitesinden rastgele resimler alındı.

**Picsum Linki? :** picsum sitesi her seferinde farklı resim veriyor, resim PHP curl komutu ile alınarak sabit linki kaydedildi ve gösterildi.

**Canvas:** HTML olarak resim oluşturma gibi işlemler için kullanıldı. Püf noktası: her işlem yapılmadan önce canvasın temizlenmesi gerekiyor.

# Geliştirme:
**Script ile ilgili her türlü geliştirme / düzenleme / yeniden oluşturma isteklerinizi bildirebilirsiniz.**

