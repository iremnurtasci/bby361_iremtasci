<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("baglanti.php");

if (isset($_GET['id'])) {
    $eserID = $_GET['id'];
    
    $silmeSorgu = mysqli_query($baglanti, "DELETE FROM eser WHERE eserID = '$eserID'");
    
    if ($silmeSorgu) {
        echo "Eser silindi.";
    } else {
        echo "Eser silinirken hata oluştu.";
    }
} else {
    echo "Eser ID bulunamadı.";
}
?>
