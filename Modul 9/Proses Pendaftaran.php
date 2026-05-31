<?php
// Latihan - Proses Pendaftaran dengan Validasi
function bersihkan_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userNama   = bersihkan_input($_POST["nama"]);
    $userNim    = bersihkan_input($_POST["nim"]);
    $userEmail  = bersihkan_input($_POST["email"]);
    $userTempat = bersihkan_input($_POST["tempat"]);
    $userTTL    = bersihkan_input($_POST["ttl"]);
    $userAlamat = bersihkan_input($_POST["alamat"]);
    $userGender = bersihkan_input($_POST["gender"]);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Pendaftaran</title>
    <style>
        body { font-family: Arial; }
        .data { border: 1px solid #aaa; padding: 10px; width: 400px; }
        .judul { font-weight: bold; color: darkblue; }
    </style>
</head>
<body>
    <h2>Data Pendaftaran Mahasiswa</h2>

    <?php if (!empty($userNama)) { ?>
        <div class="data">
            <p class="judul">Selamat datang, <?php echo $userNama; ?>!</p>
            <p><b>NIM:</b> <?php echo $userNim; ?></p>
            <p><b>Email:</b> <?php echo $userEmail; ?></p>
            <p><b>Tempat/Tanggal Lahir:</b> <?php echo $userTempat; ?>, <?php echo $userTTL; ?></p>
            <p><b>Alamat:</b> <?php echo $userAlamat; ?></p>
            <p><b>Jenis Kelamin:</b> <?php echo $userGender; ?></p>
        </div>
    <?php } else { ?>
        <p style="color:red;">Tidak ada data yang dikirim.</p>
    <?php } ?>
</body>
</html>
