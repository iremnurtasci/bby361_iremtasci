<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Refresh:0");

require_once("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eserAdi = mysqli_real_escape_string($baglanti, $_POST['eserAdi']);
    $eserISBN = mysqli_real_escape_string($baglanti, $_POST['eserISBN']);
    $eserBasimYeri = mysqli_real_escape_string($baglanti, $_POST['eserBasimYeri']);
    $eserBasimTarihi = mysqli_real_escape_string($baglanti, $_POST['eserBasimTarihi']);
    $eserSayfaSayisi = mysqli_real_escape_string($baglanti, $_POST['eserSayfaSayisi']);
    $eserDili = mysqli_real_escape_string($baglanti, $_POST['eserDili']);
    $eserOrijinalDili = mysqli_real_escape_string($baglanti, $_POST['eserOrijinalDili']);
    $yazarID = mysqli_real_escape_string($baglanti, $_POST['eserYazarID']);
    $yayineviID = mysqli_real_escape_string($baglanti, $_POST['eserYayineviID']);

    $yazarEkle = mysqli_query($baglanti, "INSERT IGNORE INTO yazar (yazarID) VALUES ('$yazarID')");
    $yayineviEkle = mysqli_query($baglanti, "INSERT IGNORE INTO yayinevi (yayineviID) VALUES ('$yayineviID')");


    $eklemeSorgu = mysqli_query($baglanti, "INSERT INTO eser (eserAdi, eserISBN, eserBasimYeri, eserBasimTarihi, eserSayfaSayisi, eserDili, eserOrijinalDili, eserYazarID, eserYayineviID) VALUES ('$eserAdi', '$eserISBN', '$eserBasimYeri', '$eserBasimTarihi', '$eserSayfaSayisi', '$eserDili', '$eserOrijinalDili', '$yazarID', '$yayineviID')");

    if ($eklemeSorgu) {
        echo "Eser eklendi.";
        header("Location: eser_islemleri.php");
exit();

    } else {
        echo "Eser eklenirken hata oluştu: " . mysqli_error($baglanti);
    }
}
?>





