<!DOCTYPE html>
<html lang="tr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.6">
<title>KATALOG</title>

<link href="./katalog_files/navbar-top.css" rel="stylesheet">
</head>
<body>

<nav>
  <ul>
    <li><a href="index.php">Ana Sayfa</a></li>
    <li><a href="kitap.php">Kitap İşlemleri</a></li>
    <li><a href="yazar.php">Yazar İşlemleri</a></li>
    <li><a href="kitaptur.php">Kitap Türü İşlemleri</a></li>
  </ul>
  <form>
    <input type="text" placeholder="Search" aria-label="Search">
    <button type="submit">Search</button>
  </form>
</nav>

<main>
<h1>Yazar Güncelle</h1>
<form action="yazar_guncellendi.php" method="post">
  Yazar Adı: <input type="text" name="yazarAd" value="<?php echo $satir["yazarAdi"] ;?>"><br><br>
  Yazar Soyadı: <input type="text" name="yazarSoyad" value="<?php echo $satir["yazarSoyadi"] ;?>"><br><br>
  Yazar Doğum Tarihi: <input type="text" name="yazarDogumTarihi" value="<?php echo $satir["yazarDogumTarihi"] ;?>"><br>
  Yazar Cinsiyet: <input type="text" name="yazarCinsiyet" value="<?php echo $satir["yazarCinsiyet"] ;?>"><br><br>
  <br>
  Yazar URL: <textarea name="yazarURL" rows="2" cols="50"><?php echo $satir["yazarURL"]?></textarea><br><br>
  Yazar E-posta: <input type="text" name="yazarEposta" value="<?php echo $satir["yazarEposta"] ;?>"><br><br>
  <input type="hidden" value="<?php echo $satir["yazarID"] ;?>" name="yazarID">
  <input type="submit" value="Yazar Güncelle">
</form>
</main>

</body>
</html>
