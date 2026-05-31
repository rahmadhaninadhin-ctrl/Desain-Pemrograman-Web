<?php
require_once "koneksi.php";

// cek npm dari URL
if (isset($_GET['npm'])) {
    $npm = mysqli_real_escape_string($conn, $_GET['npm']);
    $sql = "SELECT * FROM t_mahasiswa WHERE npm = '$npm'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        header("Location: viewmahasiswa.php?status=error&msg=Data tidak ditemukan");
        exit;
    }
} else {
    header("Location: viewmahasiswa.php?status=error&msg=NPM tidak valid");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form action="proses_editmahasiswa.php" method="post">
        <input type="hidden" name="npm" value="<?= htmlspecialchars($data['npm']) ?>">

        <label for="namaMhs">Nama Mahasiswa</label>
        <input type="text" name="namaMhs" id="namaMhs" value="<?= htmlspecialchars($data['namaMhs']) ?>" required>

        <label for="prodi">Program Studi</label>
        <input type="text" name="prodi" id="prodi" value="<?= htmlspecialchars($data['prodi']) ?>" required>

        <label for="noHP">No HP</label>
        <input type="tel" name="noHP" id="noHP" value="<?= htmlspecialchars($data['noHP']) ?>" required>

        <div class="form-actions">
            <button type="submit" name="update">💾 Simpan</button>
            <a href="viewmahasiswa.php">← Batal</a>
        </div>
    </form>
</body>
</html>
