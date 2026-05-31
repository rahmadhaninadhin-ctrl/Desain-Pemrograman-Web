<?php
require_once "koneksi.php";

// Fitur pencarian
$search = "";
$whereClause = "";
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $whereClause = " WHERE namaMhs LIKE '%$search%'";
}

// Ambil data mahasiswa dari database
$query = "SELECT * FROM t_mahasiswa" . $whereClause . " ORDER BY npm ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="brand">SIAKAD <span>Mahasiswa</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <h1>Data Mahasiswa</h1>
        <p>Daftar mahasiswa yang terdaftar di sistem akademik</p>
    </div>

    <!-- Actions -->
    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmahasiswa.php">
                <input type="text" name="search" placeholder="Cari nama mahasiswa..." value="<?= htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmahasiswa.php" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="alert alert-success">Data mahasiswa berhasil ditambahkan.</div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
            <div class="alert alert-error">Terjadi kesalahan saat menyimpan data.</div>
        <?php endif; ?>

        <!-- Tabel Data -->
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['npm']); ?></td>
                            <td><?= htmlspecialchars($row['namaMhs']); ?></td>
                            <td><?= htmlspecialchars($row['prodi']); ?></td>
                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                            <td><?= htmlspecialchars($row['noHP']); ?></td>
                            <td class="action-links">
                                <a href="editmahasiswa.php?npm=<?= $row['npm']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapusmahasiswa.php?npm=<?= $row['npm']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon">📭</div>
                <p>Belum ada data mahasiswa<?= $search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '' ?>.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
