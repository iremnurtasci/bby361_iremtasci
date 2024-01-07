<?php
require_once("baglanti.php");

$yazarID = isset($_GET['id']) ? $_GET['id'] : '';

if ($yazarID != '') {
    $sorgu = mysqli_prepare($baglanti, "SELECT yazarID, yazarAdi, yazarSoyadi, yazarDogumTarihi, yazarCinsiyet, yazarURL, yazarEposta FROM yazar WHERE yazarID = ?");
    mysqli_stmt_bind_param($sorgu, 'i', $yazarID);
    mysqli_stmt_execute($sorgu);
    mysqli_stmt_bind_result($sorgu, $yazarID, $yazarAdi, $yazarSoyadi, $yazarDogumTarihi, $yazarCinsiyet, $yazarURL, $yazarEposta);

    $yazar = array();
    if (mysqli_stmt_fetch($sorgu)) {
        $yazar = array(
            'yazarID' => $yazarID,
            'yazarAdi' => $yazarAdi,
            'yazarSoyadi' => $yazarSoyadi,
            'yazarDogumTarihi' => $yazarDogumTarihi,
            'yazarCinsiyet' => $yazarCinsiyet,
            'yazarURL' => $yazarURL,
            'yazarEposta' => $yazarEposta
        );
    }

    echo json_encode($yazar);
} else {
    echo json_encode(array());
}

mysqli_close($baglanti);
?>
