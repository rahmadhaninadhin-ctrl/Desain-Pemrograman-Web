<?php
require_once "Database.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodeMK   = $_POST['kodeMK'];
    $namaMK   = $_POST['namaMK'];
    $sks      = $_POST['sks'];
    $jam      = $_POST['jam'];

    $stmt = $db->prepare("INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $kodeMK, $namaMK, $sks, $jam);

    if ($stmt->execute()) {
        header("Location: viewmatakuliah.php?status=success&msg=Data mata kuliah berhasil ditambahkan");
        exit;
    } else {
        header("Location: viewmatakuliah.php?status=error&msg=Gagal menambahkan data");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">SIAKAD <span>Mata Kuliah</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">Mata Kuliah</a></li>
        </ul>
    </div>

    <div class="page-header">
        <h1>Tambah Data Mata Kuliah</h1>
        <p>Isi formulir di bawah untuk menambahkan mata kuliah baru</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">Formulir Mata Kuliah Baru</div>
        <form method="POST" class="form-card">
            <label for="kodeMK">Kode Mata Kuliah</label>
            <input type="text" id="kodeMK" name="kodeMK" placeholder="Contoh: MK1024" required>

            <label for="namaMK">Nama Mata Kuliah</label>
            <input type="text" id="namaMK" name="namaMK" placeholder="Masukkan nama mata kuliah" required>

            <label for="sks">Bobot SKS</label>
            <input type="number" id="sks" name="sks" placeholder="Masukkan bobot SKS (1-6)" min="1" max="6" required>

            <label for="jam">Jumlah Jam Pertemuan</label>
            <input type="number" id="jam" name="jam" placeholder="Masukkan total jam tatap muka" min="1" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
                <a href="viewmatakuliah.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
