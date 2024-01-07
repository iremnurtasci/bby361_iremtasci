<?php
    require_once("baglanti.php");

    /* Veritabanı sorgulama */
    $sorgu = mysqli_query($baglanti, "SELECT KI.*, YA.yayineviAdi, YA.yayineviURL, CONCAT(YZ.yazarAdi,' ',YZ.yazarSoyadi) AS yzAdSoyad FROM kitaplar KI, yayinevleri YA, yazarlar YZ WHERE KI.yayineviID = YA.yayineviID AND KI.yazarID = YZ.yazarID");
    $toplam = mysqli_num_rows($sorgu);
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Kitpları Listele</h1>
        <p class="lead">Bu sayfada veri tabanının kitaplar tablosunda yer alan kayıtların tamamı listelenmektedir.</p>
    <h2>Kitap Kayıtları</h2>
      <p><?php echo("Toplam kayıt sayısı: ".$toplam);?></p>
      <p>
          <?php
          while($satir = mysqli_fetch_assoc($sorgu)){
              printf("<h4>".$satir["kitapAdi"]."</h4>");
              printf("<b>Kitap yayın yılı:</b> ".$satir["kitapYayinYili"]."</br>");
              printf("<b>Yazar Adı:</b> ".$satir["yzAdSoyad"]."</br>");
              printf("<b>Yayınevi:</b> ".$satir["yayineviAdi"]."</br>");
              printf("<b>Yayınevi Web Adresi:</b> ".$satir["yayineviURL"]."</br>");
              printf("<hr>");
          }
          ?>
      </p>
  </div>
</main>

