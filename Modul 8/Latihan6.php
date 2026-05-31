<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF–8">
        <title>Latihan 6 – Perulangan</title>
    </head>
    <body>
        <h1>Belajar Perulangan di PHP</h1>

        <?php
        // while loop
        $x = 10;
        while ($x <= 5) {
            echo "Nomor : $x <br>";
            $x--;
        }

        // do while
        $x = 1;
        do {
            echo "Nomor : $x <br>";
            $x++;
        } while ($x <= 5);

        // foreach
        $colors = array("red", "green", "blue", "yellow");
        foreach ($colors as $value) {
            echo "$value <br>";
        }

        // for
        for ($x = 0; $x <= 10; $x++) {
            echo "Nomor : $x <br>";
        }
        ?>
    </body>
</html>