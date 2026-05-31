<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Gambar</title>
    <style>
        .galeri {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .galeri div {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        .galeri img {
            width: 180px;
            height: 130px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Galeri Gambar</h2>
    <div class="galeri">
        <?php
        $daftarFile = glob('gambar/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        foreach ($daftarFile as $gambar) {
            if (is_file($gambar)) {
                echo "<div>";
                echo "<img src='$gambar' alt='".basename($gambar)."'>";
                echo "<br><small>Nama File: " . basename($gambar) . "</small>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
