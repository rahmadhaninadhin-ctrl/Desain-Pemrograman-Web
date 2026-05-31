<?php
require_once "Database.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaDosen = $_POST['namaDosen'];
    $noHP      = $_POST['noHP'];

    $stmt = $db->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
    $stmt->bind_param("ss", $namaDosen, $noHP);

    if ($stmt->execute()) {
        header("Location: viewdosen.php?status=success&msg=Data dosen berhasil ditambahkan");
        exit;
    } else {
        header("Location: viewdosen.php?status=error&msg=Gagal menambahkan data");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dosen - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">SIAKAD <span>Dosen</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </div>

    <div class="page-header">
        <h1>Tambah Data Dosen</h1>
        <p>Isi formulir di bawah untuk menambahkan dosen baru</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">Formulir Dosen Baru</div>
        <form method="POST" class="form-card">
            <label for="namaDosen">Nama Dosen</label>
            <input type="text" id="namaDosen" name="namaDosen" placeholder="Masukkan nama lengkap dosen" required>

            <label for="noHP">Nomor HP</label>
            <input type="text" id="noHP" name="noHP" placeholder="08xxxxxxxxxx" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
                <a href="viewdosen.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
