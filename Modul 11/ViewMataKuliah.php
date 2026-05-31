<?php
require_once "koneksi.php";

// Fitur pencarian
$search = "";
$whereClause = "";
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $whereClause = " WHERE namaMK LIKE '%$search%'";
}

// Ambil data mata kuliah dari database
$query = "SELECT * FROM t_matakuliah" . $whereClause . " ORDER BY kodeMK ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="brand">SIAKAD <span>Mata Kuliah</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">Mata Kuliah</a></li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <h1>Data Mata Kuliah</h1>
        <p>Daftar mata kuliah yang tersedia di sistem akademik</p>
    </div>

    <!-- Actions -->
    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmatakuliah.php">
                <input type="text" name="search" placeholder="Cari nama mata kuliah..." value="<?= htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmatakuliah.php" class="btn btn-primary">+ Tambah Mata Kuliah</a>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="alert alert-success">Data mata kuliah berhasil ditambahkan.</div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
            <div class="alert alert-error">Terjadi kesalahan saat menyimpan data.</div>
        <?php endif; ?>

        <!-- Tabel Data -->
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['kodeMK']); ?></td>
                            <td><?= htmlspecialchars($row['namaMK']); ?></td>
                            <td><?= htmlspecialchars($row['sks']); ?></td>
                            <td><?= htmlspecialchars($row['semester']); ?></td>
                            <td class="action-links">
                                <a href="editmatakuliah.php?kodeMK=<?= $row['kodeMK']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapusmatakuliah.php?kodeMK=<?= $row['kodeMK']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon">📭</div>
                <p>Belum ada data mata kuliah<?= $search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '' ?>.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
