<?php
require_once("baglanti.php");

if (isset($_GET['table'])) {
    $tableName = $_GET['table'];

    // Seçilen tablonun kayıtlarını getir
    $sorguKayitlar = mysqli_query($baglanti, "SELECT * FROM $tableName");

    $kayitlar = array();

    while ($row = mysqli_fetch_assoc($sorguKayitlar)) {
        $kayitlar[] = $row;
    }

    echo json_encode($kayitlar);
} else {
    echo json_encode(array());
}
?>
