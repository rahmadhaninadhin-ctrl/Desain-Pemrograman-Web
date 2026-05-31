<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF–8">
        <title>Latihan 2 – Variable dan Konstansa</title>
    </head>
    <body>
        <h1>Belajar Variable dan Konstansa di PHP</h1>

        <?php
        // Latihan 5: Menghitung keliling lingkaran dengan jari-jari 15 cm

        $jariJari = 15;
        $pi = 3.14159;
        $keliling = 2 * $pi * $jariJari;

        echo "<h2>Menghitung Keliling Lingkaran</h2>";
        echo "Jari-jari: $jariJari cm<br>";
        echo "Pi: $pi<br>";
        echo "Rumus: K = 2 x π x r<br>";
        echo "Keliling: 2 x $pi x $jariJari = $keliling cm<br>";
        ?>
    </body>
</html>