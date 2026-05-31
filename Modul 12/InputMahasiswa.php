<?php
require_once "Database.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npm       = $_POST['npm'];
    $namaMhs   = $_POST['namaMhs'];
    $jurusan   = $_POST['jurusan'];
    $alamat    = $_POST['alamat'];
    $noHP      = $_POST['noHP'];

    $stmt = $db->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, jurusan, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $npm, $namaMhs, $jurusan, $alamat, $noHP);

    if ($stmt->execute()) {
        header("Location: viewmahasiswa.php?status=success&msg=Data mahasiswa berhasil ditambahkan");
        exit;
    } else {
        header("Location: viewmahasiswa.php?status=error&msg=Gagal menambahkan data");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">SIAKAD <span>Mahasiswa</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </div>

    <div class="page-header">
        <h1>Tambah Data Mahasiswa</h1>
        <p>Isi formulir di bawah untuk menambahkan mahasiswa baru</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">Formulir Mahasiswa Baru</div>
        <form method="POST" class="form-card">
            <label for="npm">NPM</label>
            <input type="text" id="npm" name="npm" placeholder="Masukkan NPM mahasiswa" required>

            <label for="namaMhs">Nama Mahasiswa</label>
            <input type="text" id="namaMhs" name="namaMhs" placeholder="Masukkan nama lengkap mahasiswa" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan mahasiswa" required>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap mahasiswa" required>

            <label for="noHP">Nomor HP</label>
            <input type="text" id="noHP" name="noHP" placeholder="08xxxxxxxxxx" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
                <a href="viewmahasiswa.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
