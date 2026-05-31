<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD — Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Politeknik Negeri Madiun</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Data Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">🎓 Data Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Data Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Tambah Data Mahasiswa</h1>
        <p>Isi formulir di bawah untuk menambahkan data mahasiswa baru</p>
    </div>

    <!-- Form Card -->
    <div class="card form-card fade-in">
        <div class="form-title">📝 Form Input Mahasiswa</div>
        <form action="proses_inputmahasiswa.php" method="post">
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" required>
            </div>
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" required>
            </div>
            <div class="form-group">
                <label for="emailMhs">Email</label>
                <input type="email" name="emailMhs" id="emailMhs" required>
            </div>
            <div class="form-group">
                <label for="telpMhs">No. Telepon</label>
                <input type="text" name="telpMhs" id="telpMhs">
            </div>
            <div class="form-group">
                <label for="alamatMhs">Alamat</label>
                <textarea name="alamatMhs" id="alamatMhs" rows="3"></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" name="simpan" class="btn btn-success">💾 Simpan Data</button>
                <a href="viewmahasiswa.php" class="btn btn-danger">← Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> — Tata Kelola Sistem Informasi Akademik</p>
    </div>
</body>
</html>
