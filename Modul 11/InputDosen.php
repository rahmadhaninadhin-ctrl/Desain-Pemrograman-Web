<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD — Input Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Politeknik Negeri Madiun</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">👨‍🏫 Data Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Data Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Data Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Tambah Data Dosen</h1>
        <p>Isi formulir di bawah untuk menambahkan data dosen baru</p>
    </div>

    <!-- Form Card -->
    <div class="card form-card fade-in">
        <div class="form-title">📝 Form Input Dosen</div>
        <form action="proses_inputdosen.php" method="post">
            <div class="form-group">
                <label for="nidn">NIDN</label>
                <input type="text" name="nidn" id="nidn" required>
            </div>
            <div class="form-group">
                <label for="namaDosen">Nama Dosen</label>
                <input type="text" name="namaDosen" id="namaDosen" required>
            </div>
            <div class="form-group">
                <label for="emailDosen">Email</label>
                <input type="email" name="emailDosen" id="emailDosen" required>
            </div>
            <div class="form-group">
                <label for="telpDosen">No. Telepon</label>
                <input type="text" name="telpDosen" id="telpDosen">
            </div>
            <div class="form-actions">
                <button type="submit" name="simpan" class="btn btn-success">💾 Simpan Data</button>
                <a href="viewdosen.php" class="btn btn-danger">← Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> — Tata Kelola Sistem Informasi Akademik</p>
    </div>
</body>
</html>
