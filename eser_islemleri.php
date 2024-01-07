<?php
require_once("baglanti.php");

$sorgu = mysqli_query($baglanti, "SELECT eser.*, yazar.yazarAdi AS yazarAdi, yazar.yazarSoyadi AS yazarSoyadi, yayinevi.yayineviAdi AS yayineviAdi FROM eser 
    LEFT JOIN yazar ON eser.eserYazarID = yazar.yazarID 
    LEFT JOIN yayinevi ON eser.eserYayineviID = yayinevi.yayineviID");
$eserler = array();
while ($row = mysqli_fetch_assoc($sorgu)) {
    $eserler[] = $row;
}

$yazarSorgu = mysqli_query($baglanti, "SELECT * FROM yazar");
$yazarlar = array();
while ($yazarRow = mysqli_fetch_assoc($yazarSorgu)) {
    $yazarlar[] = $yazarRow;
}

$yayineviSorgu = mysqli_query($baglanti, "SELECT * FROM yayinevi");
$yayinevleri = array();
while ($yayineviRow = mysqli_fetch_assoc($yayineviSorgu)) {
    $yayinevleri[] = $yayineviRow;
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
    <title>Eser İşlemleri</title>

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
        <h2>Eser Listesi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Eser Adı</th>
                    <th>Eser ISBN</th>
                    <th>Eser Basım Yeri</th>
                    <th>Eser Basım Tarihi</th>
                    <th>Eser Sayfa Sayısı</th>
                    <th>Eser Dili</th>
                    <th>Eser Orijinal Dili</th>
                    <th>Yazar</th>
                    <th>Yayınevi</th>
                    <th>İşlemler</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($eserler as $eser): ?>
                    <tr>
                        <td><?= $eser['eserAdi'] ?></td>
                        <td><?= $eser['eserISBN'] ?></td>
                        <td><?= $eser['eserBasimYeri'] ?></td>
                        <td><?= $eser['eserBasimTarihi'] ?></td>
                        <td><?= $eser['eserSayfaSayisi'] ?></td>
                        <td><?= $eser['eserDili'] ?></td>
                        <td><?= $eser['eserOrijinalDili'] ?></td>
                        <td><?= $eser['yazarAdi'] . ' ' . $eser['yazarSoyadi'] ?></td>
                        <td><?= $eser['yayineviAdi'] ?></td>
                        <td>
                            <a href="eser_sil.php?id=<?= $eser['eserID'] ?>" onclick="return confirm('Eseri silmek istediğinizden emin misiniz?')">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section>
    <h2>Yeni Eser Ekle</h2>
    <form action="eser_ekle.php" method="post">
        <div class="form-group">
            <label for="eserAdi">Eser Adı:</label>
            <input type="text" name="eserAdi" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserISBN">Eser ISBN:</label>
            <input type="text" name="eserISBN" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserBasimYeri">Eser Basım Yeri:</label>
            <input type="text" name="eserBasimYeri" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserBasimTarihi">Eser Basım Tarihi:</label>
            <input type="text" name="eserBasimTarihi" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserSayfaSayisi">Eser Sayfa Sayısı</label>
            <input type="text" name="eserSayfaSayisi" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserDili">Eser Dili:</label>
            <input type="text" name="eserDili" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserOrijinalDili">Eser Orijinal Dili:</label>
            <input type="text" name="eserOrijinalDili" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserYazarID">Eser Yazar ID:</label>
            <input type="text" name="eserYazarID" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="eserYayineviID">Eser Yayınevi ID:</label>
            <input type="text" name="eserYayineviID" class="form-control1" required>
        </div>
        <button type="submit" class="btn btn-primary">Eser Ekle</button>
    </form>
</section>


        <section>
    <h2>Eser Güncelle</h2>
    <form action="eser_guncelle.php" method="post">
        <div class="form-group">
            <label for="guncellenecekEser">Güncellenecek Eser:</label>
            <select name="guncellenecekEser" id="guncellenecekEser" class="form-control1" onchange="eserBilgileriniGetir(this.value)">
                <?php foreach ($eserler as $eser): ?>
                    <option value="<?= $eser['eserID'] ?>"><?= $eser['eserAdi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="yeniEserAdi">Yeni Eser Adı:</label>
            <input type="text" name="yeniEserAdi" id="yeniEserAdi" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniEserISBN">Yeni Eser ISBN:</label>
            <input type="text" name="yeniEserISBN" id="yeniEserISBN" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniEserBasimYeri">Yeni Eser Basım Yeri:</label>
            <input type="text" name="yeniEserBasimYeri" id="yeniEserBasimYeri" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniEserBasimTarihi">Yeni Eser Basım Tarihi:</label>
            <input type="text" name="yeniEserBasimTarihi" id="yeniEserBasimTarihi" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniEserSayfaSayisi">Yeni Eser Sayfa Sayi:</label>
            <input type="text" name="yeniEserSayfaSayisi" id="yeniEserSayfaSayisi" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniEserDili">Yeni Eser Dili:</label>
            <input type="text" name="yeniEserDili" id="yeniEserDili" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniEserOrijinalDili">Yeni Eser Orijinal Dili:</label>
            <input type="text" name="yeniEserOrijinalDili" id="yeniEserOrijinalDili" class="form-control1" required>
        </div>
        <div class="form-group">
            <label for="yeniYazarID">Yazar:</label>
            <select name="yeniYazarID" id="yeniYazarID" class="form-control1" required>
                <?php foreach ($yazarlar as $yazar): ?>
                    <option value="<?= $yazar['yazarID'] ?>"><?= $yazar['yazarAdi'] . ' ' . $yazar['yazarSoyadi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="yeniYayineviID">Yayınevi:</label>
            <select name="yeniYayineviID" id="yeniYayineviID" class="form-control1" required>
                <?php foreach ($yayinevleri as $yayinevi): ?>
                    <option value="<?= $yayinevi['yayineviID'] ?>"><?= $yayinevi['yayineviAdi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Eser Güncelle</button>
    </form>
</section>

    <script>
    function eserBilgileriniGetir(eserID) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var eser = JSON.parse(this.responseText);

            document.getElementById("yeniEserAdi").value = eser.eserAdi;
            document.getElementById("yeniEserISBN").value = eser.eserISBN;
            document.getElementById("yeniEserBasimYeri").value = eser.eserBasimYeri;
            document.getElementById("yeniEserBasimTarihi").value = eser.eserBasimTarihi;
            document.getElementById("yeniEserSayfaSayisi").value = eser.eserSayfaSayisi;
            document.getElementById("yeniEserDili").value = eser.eserDili;
            document.getElementById("yeniEserOrijinalDili").value = eser.eserOrijinalDili;
            document.getElementById("yeniYazarID").value = eser.eserYazarID;
            document.getElementById("yeniYayineviID").value = eser.eserYayineviID;
        }
    };

    xhr.open("GET", "get_eser.php?id=" + eserID, true);
    xhr.send();
}

</script>


            <button type="submit">Eser Güncelle</button>
        </form>
    </section>
    
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








