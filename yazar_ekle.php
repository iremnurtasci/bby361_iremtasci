<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yazarAdi = $_POST['yazarAdi'];
    $yazarSoyadi = $_POST['yazarSoyadi'];
    $yazarDogumTarihi = $_POST['yazarDogumTarihi'];
    $yazarCinsiyet = $_POST['yazarCinsiyet'];
    $yazarURL = $_POST['yazarURL'];
    $yazarEposta = $_POST['yazarEposta'];

    $eklemeSorgu = mysqli_query($baglanti, "INSERT INTO yazar (yazarAdi, yazarSoyadi, yazarDogumTarihi, yazarCinsiyet, yazarURL, yazarEposta) VALUES ('$yazarAdi', '$yazarSoyadi', '$yazarDogumTarihi', '$yazarCinsiyet', '$yazarURL', '$yazarEposta')");

    if ($eklemeSorgu) {
        echo "Yazar eklendi.";
    } else {
        echo "Yazar eklenirken hata oluştu: " . mysqli_error($baglanti);
    }
}
?>


