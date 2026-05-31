<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF–8">
        <title>Latihan 5 – Switch Case</title>
    </head>
    <body>
        <h1>Belajar Switch Case di PHP</h1>

        <?php
        // Latihan 5: Switch Statement

        $warna = "merah";
        switch ($warna) {
            case "merah":
                echo "warna adalah merah";
                break;
            case "kuning":
                echo "warna adalah kuning";
                break;
            case "hijau":
                echo "Warna adalah hijau";
                break;
            default:
                echo "warna tidak dikenal!";
        }
        echo "<br>";
        ?>
    </body>
</html>