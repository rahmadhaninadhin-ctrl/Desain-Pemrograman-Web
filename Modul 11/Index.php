<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD — Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Politeknik Negeri Madiun</span></div>
        <ul class="nav-links">
            <li><a href="index.php" class="active">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Data Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Data Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Data Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Selamat Datang di Sistem Informasi Akademik</h1>
        <p>Kelola data dosen, mahasiswa, dan mata kuliah dengan mudah</p>
    </div>

    <!-- Card Menu -->
    <div class="card-container fade-in">
        <div class="card">
            <h2>👨‍🏫 Dosen</h2>
            <p>Kelola data dosen</p>
            <a href="viewdosen.php" class="btn btn-primary">Lihat Data</a>
        </div>
        <div class="card">
            <h2>🎓 Mahasiswa</h2>
            <p>Kelola data mahasiswa</p>
            <a href="viewmahasiswa.php" class="btn btn-primary">Lihat Data</a>
        </div>
        <div class="card">
            <h2>📚 Mata Kuliah</h2>
            <p>Kelola data mata kuliah</p>
            <a href="viewmatakuliah.php" class="btn btn-primary">Lihat Data</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> — Tata Kelola Sistem Informasi Akademik</p>
    </div>
</body>
</html>
