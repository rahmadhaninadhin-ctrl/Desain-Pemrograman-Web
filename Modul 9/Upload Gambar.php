<?php
// Upload gambar dengan PHP

$folderTujuan = "gambar/";
$statusUpload = 1;
$infoUpload = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gambar"])) {
    $fileTujuan = $folderTujuan . basename($_FILES["gambar"]["name"]);
    $tipeFile = strtolower(pathinfo($fileTujuan, PATHINFO_EXTENSION));

    // cek apakah file benar-benar gambar
    $cek = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($cek !== false) {
        $infoUpload .= "File terdeteksi sebagai gambar - " . $cek["mime"] . "<br>";
    } else {
        $infoUpload .= "File bukan gambar.<br>";
        $statusUpload = 0;
    }

    // cek apakah file sudah ada
    if (file_exists($fileTujuan)) {
        $infoUpload .= "Nama file sudah digunakan.<br>";
        $statusUpload = 0;
    }

    // cek ukuran file (maks 500KB)
    if ($_FILES["gambar"]["size"] > 500000) {
        $infoUpload .= "Ukuran file terlalu besar (maks 500KB).<br>";
        $statusUpload = 0;
    }

    // cek format file
    $formatValid = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($tipeFile, $formatValid)) {
        $infoUpload .= "Format file tidak diizinkan. Hanya JPG, JPEG, PNG, GIF.<br>";
        $statusUpload = 0;
    }

    // proses upload
    if ($statusUpload == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $fileTujuan)) {
            $infoUpload .= "<div style='color:green;'>File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil diunggah.</div>";
        } else {
            $infoUpload .= "<div style='color:red;'>Terjadi kesalahan saat mengunggah file.</div>";
        }
    } else {
        $infoUpload .= "<div style='color:red;'>File gagal diunggah.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload Gambar</title>
</head>
<body>
    <h2>Form Upload Gambar</h2>
    
    <?php if (!empty($infoUpload)) { echo "<p>$infoUpload</p>"; } ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="gambar">Pilih gambar untuk diunggah:</label><br>
        <input type="file" name="gambar" id="gambar" required><br><br>
        <input type="submit" value="Unggah Gambar" name="submit">
    </form>
</body>
</html>
