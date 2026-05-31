<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

// Hitung jumlah data untuk statistik dashboard
$totalDosen = $con->query("SELECT COUNT(*) AS total FROM t_dosen")->fetch_assoc()['total'];
$totalMahasiswa = $con->query("SELECT COUNT(*) AS total FROM t_mahasiswa")->fetch_assoc()['total'];
$totalMatakuliah = $con->query("SELECT COUNT(*) AS total FROM t_matakuliah")->fetch_assoc()['total'];

$con->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard — Sistem Informasi Akademik</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php" class="active">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Dashboard Akademik</h1>
        <p>Ringkasan data akademik kampus</p>
    </div>

    <div class="card fade-in">
        <div class="stats-grid">
            <div class="stat-box">
                <h2><?= $totalDosen; ?></h2>
                <p>Dosen</p>
                <a href="viewdosen.php" class="btn btn-primary">Lihat Data</a>
            </div>
            <div class="stat-box">
                <h2><?= $totalMahasiswa; ?></h2>
                <p>Mahasiswa</p>
                <a href="viewmahasiswa.php" class="btn btn-primary">Lihat Data</a>
            </div>
            <div class="stat-box">
                <h2><?= $totalMatakuliah; ?></h2>
                <p>Mata Kuliah</p>
                <a href="viewmatakuliah.php" class="btn btn-primary">Lihat Data</a>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
