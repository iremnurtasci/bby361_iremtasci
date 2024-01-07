<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("baglanti.php");

if (isset($_GET['id'])) {
    $yazarID = $_GET['id'];
    
    $silmeSorgu = mysqli_query($baglanti, "DELETE FROM yazar WHERE yazarID = '$yazarID'");
    
    if ($silmeSorgu) {
        echo "Yazar silindi.";
    } else {
        echo "Yazar silinirken hata oluştu.";
    }
} else {
    echo "Yazar ID bulunamadı.";
}
?>
