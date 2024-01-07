<?php
require_once("baglanti.php");

$sorguTablolar = mysqli_query($baglanti, "SHOW TABLES");

$varsayilanSecim = 'eser_yazar_yayinevi';

if ($satirTablo = mysqli_fetch_row($sorguTablolar)) {
    $varsayilanSecim = $satirTablo[0];
}

$sorguKayitlar = mysqli_query($baglanti, "SELECT * FROM $varsayilanSecim");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Kayıtları Listele</title>

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
        <a href="yazar_islemleri">Yazar İşlemleri</a>
        <input type="text" placeholder="Ara...">
        <button>Ara</button>
    </nav>

    <section>
        <div class="container mt-3">
            <form method="post" action="">
                <label for="secim">Tablo Seç:</label>
                <select id="secim" name="secim" onchange="getTableData(this.value)">
                    <?php
                        $sorguTablolar = mysqli_query($baglanti, "SHOW TABLES");
                        
                        while($satirTablo = mysqli_fetch_row($sorguTablolar)) {
                            $selected = ($satirTablo[0] == $varsayilanSecim) ? 'selected' : '';
                            echo '<option value="' . $satirTablo[0] . '" ' . $selected . '>' . $satirTablo[0] . '</option>';
                        }
                    ?>
                </select>
            </form>

            <h2 class="mt-3">Kayıtlar</h2>
            <table id="kayitlar" class="table table-bordered">
                <thead>
                    <?php
                        $sorguKolonlar = mysqli_query($baglanti, "SHOW COLUMNS FROM $varsayilanSecim");
                        echo '<tr>';
                        while($kolon = mysqli_fetch_assoc($sorguKolonlar)) {
                            echo '<th>' . $kolon['Field'] . '</th>';
                        }
                        echo '</tr>';
                    ?>
                </thead>
                <tbody>
                    <?php
                        while($satirKayitlar = mysqli_fetch_assoc($sorguKayitlar)) {
                            echo '<tr>';
                            foreach($satirKayitlar as $deger) {
                                echo '<td>' . $deger . '</td>';
                            }
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
        &copy; BBY361 Final Projesi
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function getTableData(tabloAdi) {
            fetch('get_table_data.php?table=' + tabloAdi)
                .then(response => response.json())
                .then(data => {
                    updateTable(data);
                })
                .catch(error => console.error('Error:', error));
        }

        function updateTable(data) {
            var table = document.getElementById('kayitlar');
            table.innerHTML = ''; 
            
            var headerRow = table.createTHead().insertRow(0);
            for (var key in data[0]) {
                if (data[0].hasOwnProperty(key)) {
                    var th = document.createElement('th');
                    th.innerHTML = key;
                    headerRow.appendChild(th);
                }
            }

            for (var i = 0; i < data.length; i++) {
                var row = table.insertRow(-1);
                for (var key in data[i]) {
                    if (data[i].hasOwnProperty(key)) {
                        var cell = row.insertCell(-1);
                        cell.innerHTML = data[i][key];
                    }
                }
            }
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
</body>
</html>




