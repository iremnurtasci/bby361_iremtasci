<?php
    require_once("baglanti.php");

    $yazarAdi = mysqli_real_escape_string($baglanti, $_POST['yazarAdi']);
    $yazarSoyadi = mysqli_real_escape_string($baglanti, $_POST['yazarSoyadi']);
    $yazarDogumTarihi = mysqli_real_escape_string($baglanti, $_POST['yazarDogumTarihi']);
    $yazarCinsiyet = mysqli_real_escape_string($baglanti, $_POST['yazarCinsiyet']);
    $yazarURL = mysqli_real_escape_string($baglanti, $_POST['yazarURL']);
    $yazarEposta = mysqli_real_escape_string($baglanti, $_POST['yazarEposta']);
    $sorgu = "INSERT INTO yazar (yazarAdi, yazarSoyadi, yazarDogumTarihi, yazarCinsiyet, yazarURL, yazarEposta)
            VALUES ('$yazarAdi', '$yazarSoyadi', 'yazarDogumTarihi', 'yazarCinsiyet', '$yazarURL', 'yazarEposta')";

    if (mysqli_query($baglanti, $sorgu)) {
        $islemSonuc = "Yeni kayıt Başarıyla Oluşturuldu.";
    } else {
        $islemSonuc = "Hata: " . $sorgu . "<br>" . mysqli_error($baglanti);
    }

    $sorgu2 = mysqli_query($baglanti, "SELECT * FROM yazar ORDER BY yazarID DESC");

    mysqli_close($baglanti);

?>
