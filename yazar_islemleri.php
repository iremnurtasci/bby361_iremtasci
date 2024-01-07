<?php
require_once("baglanti.php");

$sorgu = mysqli_query($baglanti, "SELECT * FROM yazar");
$yazarlar = array();
while ($row = mysqli_fetch_assoc($sorgu)) {
    $yazarlar[] = $row;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Yazar İşlemleri</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav {
            background-color: #ddd;
            padding: 10px;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
        }

        section {
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control1 {
            width: 300px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kütüphane Katalogu</h1>
    </header>

    <nav>
        <a href="index.php">Ana Sayfa</a>
        <a href="kayitlari_listele.php">Kayıtları Listele</a>
        <a href="eser_islemleri.php">Eser İşlemleri</a>
        <a href="yazar_islemleri.php">Yazar İşlemleri</a>
        <input type="text" placeholder="Ara...">
        <button>Ara</button>
    </nav>

    <section>
        <h2>Yazar Listesi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Yazar Adı Soyadı</th>
                    <th>Doğum Tarihi</th>
                    <th>Cinsiyet</th>
                    <th>URL</th>
                    <th>Eposta</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($yazarlar as $yazar): ?>
                    <tr>
                        <td><?= $yazar['yazarAdi'] . ' ' . $yazar['yazarSoyadi'] ?></td>
                        <td><?= $yazar['yazarDogumTarihi'] ?></td>
                        <td><?= $yazar['yazarCinsiyet'] ?></td>
                        <td><?= $yazar['yazarURL'] ?></td>
                        <td><?= $yazar['yazarEposta'] ?></td>
                        <td>
                            <a href="sil.php?id=<?= $yazar['yazarID'] ?>" onclick="return confirm('Yazarı silmek istediğinizden emin misiniz?')">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>


    <section>
        <h2>Yazar Ekle</h2>
        <form action="yazar_ekle.php" method="post">
            <div class="form-group">
                <label for="yazarAdi">Yazar Adı:</label>
                <input type="text" name="yazarAdi" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yazarSoyadi">Yazar Soyadı:</label>
                <input type="text" name="yazarSoyadi" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yazarDogumTarihi">Yazar Doğum Tarihi:</label>
                <input type="text" name="yazarDogumTarihi" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yazarCinsiyet">Yazar Cinsiyet:</label>
                <input type="text" name="yazarCinsiyet" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yazarURL">Yazar URL:</label>
                <input type="text" name="yazarURL" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yazarEposta">Yazar Eposta:</label>
                <input type="text" name="yazarEposta" class="form-control1" required>
            </div>
            <button type="submit" class="btn btn-primary">Yazar Ekle</button>
        </form>
    </section>

    <section>
        <h2>Yazar Güncelle</h2>
        <form action="yazar_guncellendi.php" method="post">
            <div class="form-group">
                <label for="guncellenecekYazar">Güncellenecek Yazar:</label>
                <select name="guncellenecekYazar" id="guncellenecekYazar" class="form-control1" onchange="yazarBilgileriniGetir(this.value)">
                    <?php foreach ($yazarlar as $yazar): ?>
                        <option value="<?= $yazar['yazarID'] ?>"><?= $yazar['yazarAdi'] . ' ' . $yazar['yazarSoyadi'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="yeniYazarAdi">Yeni Yazar Adı:</label>
                <input type="text" name="yeniYazarAdi" id="yeniYazarAdi" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yeniYazarSoyadi">Yeni Yazar Soyadı:</label>
                <input type="text" name="yeniYazarSoyadi" id="yeniYazarSoyadi" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yeniYazarDogumTarihi">Yeni Yazar Doğum Tarihi:</label>
                <input type="text" name="yeniYazarDogumTarihi" id="yeniYazarDogumTarihi" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yeniYazarCinsiyet">Yeni Yazar Cinsiyet:</label>
                <input type="text" name="yeniYazarCinsiyet" id="yeniYazarCinsiyet" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yeniYazarURL">Yeni Yazar URL:</label>
                <input type="text" name="yeniYazarURL" id="yeniYazarURL" class="form-control1" required>
            </div>
            <div class="form-group">
                <label for="yeniYazarEposta">Yeni Yazar Eposta:</label>
                <input type="text" name="yeniYazarEposta" id="yeniYazarEposta" class="form-control1" required>
            </div>
            <input type="hidden" id="yazarID" name="yazarID">
            <button type="submit" class="btn btn-primary">Yazar Güncelle</button>
        </form>
    </section>

    <script>
        function yazarBilgileriniGetir(yazarID) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var yazar = JSON.parse(this.responseText);

                    document.getElementById("yeniYazarAdi").value = yazar.yazarAdi;
                    document.getElementById("yeniYazarSoyadi").value = yazar.yazarSoyadi;
                    document.getElementById("yeniYazarDogumTarihi").value = yazar.yazarDogumTarihi;
                    document.getElementById("yeniYazarCinsiyet").value = yazar.yazarCinsiyet;
                    document.getElementById("yeniYazarURL").value = yazar.yazarURL;
                    document.getElementById("yeniYazarEposta").value = yazar.yazarEposta;
                    document.getElementById("yazarID").value = yazar.yazarID;
                }
            };

            xhr.open("GET", "get_yazar.php?id=" + yazarID, true);
            xhr.send();
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var aramaButonu = document.querySelector("button");
            var aramaInput = document.querySelector("input");

            aramaButonu.addEventListener("click", function() {
                var aramaKelimesi = aramaInput.value;
                window.location.href = "arama_sonuc.php?q=" + aramaKelimesi;
            });
        });
    </script>

    <footer>
        &copy; BBY361 Final Projesi
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

