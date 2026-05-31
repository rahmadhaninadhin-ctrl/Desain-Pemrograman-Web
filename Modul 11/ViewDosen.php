<?php
require_once "koneksi.php";


$search = "";
$whereClause = "";
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $whereClause = " WHERE namaDosen LIKE '%$search%'";
}


$query = "SELECT * FROM t_dosen" . $whereClause . " ORDER BY nidn ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Dosen - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="brand">SIAKAD <span>Dosen</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <h1>Data Dosen</h1>
        <p>Daftar dosen yang terdaftar di sistem akademik</p>
    </div>

    <!-- Actions -->
    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewdosen.php">
                <input type="text" name="search" placeholder="Cari nama dosen..." value="<?= htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputdosen.php" class="btn btn-primary">+ Tambah Dosen</a>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="alert alert-success">Data dosen berhasil ditambahkan.</div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
            <div class="alert alert-error">Terjadi kesalahan saat menyimpan data.</div>
        <?php endif; ?>

        <!-- Tabel Data -->
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nidn']); ?></td>
                            <td><?= htmlspecialchars($row['namaDosen']); ?></td>
                            <td><?= htmlspecialchars($row['noHP']); ?></td>
                            <td class="action-links">
                                <a href="editdosen.php?nidn=<?= $row['nidn']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapusdosen.php?nidn=<?= $row['nidn']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon">📭</div>
                <p>Belum ada data dosen<?= $search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '' ?>.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
