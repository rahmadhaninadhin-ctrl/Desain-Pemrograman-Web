<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF–8">
        <title>Latihan 2 – Variable dan Konstansa</title>
    </head>
    <body>
        <h1>Belajar Variable dan Konstansa di PHP</h1>

        <?php
        // variable dalam PHP
        $txt = "Selamat Datang!";
        $txt2 = "Politeknik Negeri Madiun";
        $x = 5;
        $y = 10.5;

        echo "<p>Isi variable txt adalah: $txt</p>";
        echo "<p>Isi variable x adalah: $x</p>";
        echo "<p>Isi variable y adalah: $y</p>";
        echo "Belajar PHP di " . $txt2 . "<br";
        echo "Hasil penjumlahan x + Y = " . ($x + $y);

        // konstanta
        define("NAMA_KONSTANTA", "Nadhin Ayudya");
        echo "<br>Isi konstanta adalah: " . NAMA_KONSTANTA;
        ?>
    </body>
</html>