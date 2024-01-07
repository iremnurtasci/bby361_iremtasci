<?php
require_once("baglanti.php");

$eserID = isset($_GET['id']) ? $_GET['id'] : '';

if ($eserID != '') {
    $sorgu = mysqli_prepare($baglanti, "SELECT eserID, eserAdi, eserISBN, eserBasimYeri, eserBasimTarihi, eserSayfaSayisi, eserDili, eserOrijinalDili, eserYazarID, eserYayineviID FROM eser WHERE eserID = ?");
    mysqli_stmt_bind_param($sorgu, 'i', $eserID);
    mysqli_stmt_execute($sorgu);
    mysqli_stmt_bind_result($sorgu, $eserID, $eserAdi, $eserISBN, $eserBasimYeri, $eserBasimTarihi, $eserSayfaSayisi, $eserDili, $eserOrijinalDili, $eserYazarID, $eserYayineviID);

    $eser = array();
    if (mysqli_stmt_fetch($sorgu)) {
        $eser = array(
            'eserID' => $eserID,
            'eserAdi' => $eserAdi,
            'eserISBN' => $eserISBN,
            'eserBasimYeri' => $eserBasimYeri,
            'eserBasimTarihi' => $eserBasimTarihi,
            'eserSayfaSayisi' => $eserSayfaSayisi,
            'eserDili' => $eserDili,
            'eserOrijinalDili' => $eserOrijinalDili,
            'eserYazarID' => $eserYazarID,
            'eserYayineviID' => $eserYayineviID
        );
    }

    echo json_encode($eser);
} else {
    echo json_encode(array());
}

mysqli_close($baglanti);
?>

