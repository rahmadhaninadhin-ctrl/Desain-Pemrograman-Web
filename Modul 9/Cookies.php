<?php
// Latihan 9.6 - Cookies untuk identitas

// Simpan cookies (harus sebelum output HTML)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["simpan"])) {
    $userNama  = $_POST["nama"];
    $userEmail = $_POST["email"];
    $userNim   = $_POST["nim"];
    
    // Cookies berlaku 2 jam (7200 detik)
    setcookie("userNama", $userNama, time() + 7200, "/");
    setcookie("userEmail", $userEmail, time() + 7200, "/");
    setcookie("userNim", $userNim, time() + 7200, "/");
    
    // Redirect untuk mencegah form resubmission
    header("Location: cookies.php");
    exit();
}

// Hapus cookies
if (isset($_GET["hapus"])) {
    setcookie("userNama", "", time() - 3600, "/");
    setcookie("userEmail", "", time() - 3600, "/");
    setcookie("userNim", "", time() - 3600, "/");
    header("Location: cookies.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cookies - Identitas</title>
</head>
<body>
    <h2>Cookies - Menyimpan Identitas Mahasiswa</h2>

    <?php if (isset($_COOKIE["userNama"]) && !empty($_COOKIE["userNama"])) { ?>
        <h3>Data tersimpan di Cookies:</h3>
        <p><b>Nama:</b> <?php echo htmlspecialchars($_COOKIE["userNama"]); ?></p>
        <p><b>Email:</b> <?php echo htmlspecialchars($_COOKIE["userEmail"]); ?></p>
        <p><b>NIM:</b> <?php echo htmlspecialchars($_COOKIE["userNim"]); ?></p>
        <a href="cookies.php?hapus=1">Hapus Cookies</a>
    <?php } else { ?>
        <h3>Belum ada data. Silakan isi form:</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nama: <input type="text" name="nama" required><br><br>
            Email: <input type="email" name="email" required><br><br>
            NIM: <input type="text" name="nim" required><br><br>
            <input type="submit" name="simpan" value="Simpan ke Cookies">
        </form>
    <?php } ?>
</body>
</html>
