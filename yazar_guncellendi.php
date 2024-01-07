
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("baglanti.php");

$islemSonuc = ""; 


$sorguYazarlar = mysqli_query($baglanti, "SELECT * FROM yazar");
$yazarlar = mysqli_fetch_all($sorguYazarlar, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $guncellenecekYazarID = mysqli_real_escape_string($baglanti, $_POST['guncellenecekYazar']);
    
    $yeniYazarAdi = mysqli_real_escape_string($baglanti, $_POST['yeniYazarAdi']);
    $yeniYazarSoyadi = mysqli_real_escape_string($baglanti, $_POST['yeniYazarSoyadi']);
    $yeniYazarURL = mysqli_real_escape_string($baglanti, $_POST['yeniYazarURL']);

    $guncellemeSorgu = mysqli_query($baglanti, "UPDATE yazar SET 
        yazarAd = '$yeniYazarAdi', 
        yazarSoyad = '$yeniYazarSoyadi', 
        yazarURL = '$yeniYazarURL' 
        WHERE yazarID = '$guncellenecekYazarID'");

    if ($guncellemeSorgu) {
        $islemSonuc = "Yazar güncellendi.";
    } else {
        $islemSonuc = "Yazar güncellenirken hata oluştu: " . mysqli_error($baglanti);
    }
}
