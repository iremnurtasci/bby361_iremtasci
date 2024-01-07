<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("baglanti.php");

$sorgu = mysqli_query($baglanti, "SELECT * from eser");
$eserler = mysqli_fetch_all($sorgu, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guncellenecekEserID = $_POST['guncellenecekEser'];

    $yeniEserAdi = $_POST['yeniEserAdi'];
    $yeniEserISBN = $_POST['yeniEserISBN'];
    $yeniEserBasimYeri = $_POST['yeniEserBasimYeri'];
    $yeniEserBasimTarihi = $_POST['yeniEserBasimTarihi'];
    $yeniEserSayfaSayisi = $_POST['yeniEserSayfaSayisi'];
    $yeniEserDili = $_POST['yeniEserDili'];
    $yeniEserOrijinalDili = $_POST['yeniEserOrijinalDili'];
    $yeniYazarID = $_POST['yeniYazarID'];
    $yeniYayineviID = $_POST['yeniYayineviID'];
    $yeniYayineviID = $_POST['yeniYayineviID'];

    $guncellemeSorgu = mysqli_query($baglanti, "UPDATE eser SET 
        eserAdi = '$yeniEserAdi', 
        eserISBN = '$yeniEserISBN', 
        eserBasimYeri = '$yeniEserBasimYeri',
        eserBasimTarihi ='$yeniEserBasimTarihi',
        eserSayfaSayisi ='$yeniEserSayfaSayisi',
        eserDili = '$yeniEserDili', 
        eserOrijinalDili = '$yeniEserOrijinalDili', 
        eserYazarID = '$yeniYazarID', 
        eserYayineviID = '$yeniYayineviID'
        WHERE eserID = '$guncellenecekEserID'");

    if ($guncellemeSorgu) {
        echo "Eser güncellendi.";
    } else {
        echo "Eser güncellenirken hata oluştu: " . mysqli_error($baglanti);
    }
}






