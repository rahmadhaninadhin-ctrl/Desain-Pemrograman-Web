<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD — Input Data Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Politeknik Negeri Madiun</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Data Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Data Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">📚 Data Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Tambah Data Mata Kuliah</h1>
        <p>Isi formulir di bawah untuk menambahkan data mata kuliah baru</p>
    </div>

    <!-- Form Card -->
    <div class="card form-card fade-in">
        <div class="form-title">📝 Form Input Mata Kuliah</div>
        <form action="proses_inputmatakuliah.php" method="post">
            <div class="form-group">
                <label for="kodeMK">Kode Mata Kuliah</label>
                <input type="text" name="kodeMK" id="kodeMK" required>
            </div>
            <div class="form-group">
                <label for="namaMK">Nama Mata Kuliah</label>
                <input type="text" name="namaMK" id="namaMK" required>
            </div>
            <div class="form-group">
                <label for="sks">Jumlah SKS</label>
                <input type="number" name="sks" id="sks" min="1" max="6" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="number" name="semester" id="semester" min="1" max="8" required>
            </div>
            <div class="form-actions">
                <button type="submit" name="simpan" class="btn btn-success">💾 Simpan Data</button>
                <a href="viewmatakuliah.php" class="btn btn-danger">← Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> — Tata Kelola Sistem Informasi Akademik</p>
    </div>
</body>
</html>
