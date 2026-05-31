<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF–8">
        <title>Latihan 2 – Variable dan Konstansa</title>
    </head>
    <body>
        <h1>Belajar Variable dan Konstansa di PHP</h1>

        <?php
        // latihanPerulangan2.php
        // Menampilkan nilai array apakah ganjil atau genap

        $angka = array(12, 13, 15, 16, 67, 189, 346, 876, 54232, 3256);

        echo "<h2>Ganjil atau Genap</h2>";
        foreach ($angka as $nilai) {
            if ($nilai % 2 == 0) {
                echo "Nomor : $nilai Genap<br>";
            } else {
                echo "Nomor : $nilai Ganjil<br>";
            }
        }
        ?>
    </body>
</html>