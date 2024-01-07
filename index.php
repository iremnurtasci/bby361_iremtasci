<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Kütüphane Katalogu</title>

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
        section {
            padding: 20px;
            text-align: center;
        }
        .galeri {
            align-items: center;
            height: 100vh; 
        }

        .galeri img {
            max-width: 100%;
            max-height: 100%;
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
        <h2>Hoş Geldiniz!</h2>
        <p>Katalogta kayıtları listele kısmından tüm tablolardaki kayıtlara ulaşabilir, eser işlemleri kısmından eserleri listeleyerek istediğiniz eseri silebilir, yeni eser ekleyebilir veya bir eseri güncelleyebilirsiniz. Yazar işlemleri kısmından da aynı işlemleri yazar tablosu üzerinden yapabilirsiniz. Arama kısmında ise eser, yazar, yayınevi veya herhangi bir kelime girerek veritabanındaki kayıtlara ulaşabilirsiniz.</p>
        <div class="galeri">
            <img src="kitap.png" alt="Görsel 1">
        </div>
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
