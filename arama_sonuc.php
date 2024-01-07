<?php
    require_once("baglanti.php");

    $q = mysqli_real_escape_string($baglanti, $_GET["q"]);

    $sorgu = mysqli_query($baglanti, "SELECT ES.*, YA.yayineviAdi, YA.yayineviURL, CONCAT(YZ.yazarAdi,' ',YZ.yazarSoyadi) AS yzAdSoyad FROM eser ES, yayinevi YA, yazar YZ WHERE ES.eserYayineviID = YA.yayineviID AND ES.eserYazarID = YZ.yazarID AND (ES.eserAdi LIKE('%$q%') OR YZ.yazarAdi LIKE('%$q%') OR YZ.yazarSoyadi LIKE('%$q%') OR YA.yayineviAdi LIKE('%$q%'))");

    $toplam = mysqli_num_rows($sorgu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kütüphane Katalogu - Arama Sonuçları</title>
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
        <h1>Kütüphane Katalogu - Arama Sonuçları</h1>
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
        <h2>Arama Sonuçları</h2>
        <p>Arama teriminiz: <?php echo $q; ?></p>
        <p><?php echo("Toplam kayıt sayısı: ".$toplam);?></p>
        <h3>Eser Kayıtları</h3>
        <p>
            <?php
             while ($satir = mysqli_fetch_assoc($sorgu)) {
                echo "<h4>" . $satir["eserAdi"] . "</h4>";
                echo "<b>Eser Basım Tarihi:</b> " . $satir["eserBasimTarihi"] . "<br>";
                echo "<b>Yazar Adı Soyadı:</b> " . $satir["yzAdSoyad"] . "<br>";
                echo "<b>Yayınevi:</b> " . $satir["yayineviAdi"] . "<br>";
                echo "<b>Yayınevi Web Adresi:</b> " . $satir["yayineviURL"] . "<br>";
                echo "<hr>";
            }
            ?>
        </p>
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
</body>
</html>



