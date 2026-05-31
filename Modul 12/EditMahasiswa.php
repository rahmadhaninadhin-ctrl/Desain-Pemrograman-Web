<?php
require_once "Database.php";

$db = new Database();

// Ambil npm dari URL
if (isset($_GET['npm'])) {
    $npm = intval($_GET['npm']);

    // Ambil data lama untuk ditampilkan di form
    $stmt = $db->prepare("SELECT * FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("i", $npm);
    $stmt->execute();
    $result = $stmt->get_result();
    $mhs = $result->fetch_assoc();

    if (!$mhs) {
        header("Location: viewmahasiswa.php");
        exit;
    }
} else {
    header("Location: viewmahasiswa.php");
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaMhs = $_POST['namaMhs'];
    $prodi   = $_POST['prodi'];
    $alamat  = $_POST['alamat'];
    $noHP    = $_POST['noHP'];

    $stmt = $db->prepare("UPDATE t_mahasiswa SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ? WHERE npm = ?");
    $stmt->bind_param("ssssi", $namaMhs, $prodi, $alamat, $noHP, $npm);

    if ($stmt->execute()) {
        header("Location: viewmahasiswa.php?status=success");
        exit;
    } else {
        echo "Gagal update data: " . $db->conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa - SIAKAD</title>
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
        <h1>Edit Data Mahasiswa</h1>
        <p>Perbarui informasi mahasiswa di sistem akademik</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">Perubahan Data Mahasiswa</div>
        <form method="POST" class="form-card">
            <input type="hidden" name="npm" value="<?= htmlspecialchars($mhs['npm']); ?>">

            <label for="namaMhs">Nama Mahasiswa</label>
            <input type="text" id="namaMhs" name="namaMhs" value="<?= htmlspecialchars($mhs['namaMhs']); ?>" required>

            <label for="prodi">Program Studi</label>
            <input type="text" id="prodi" name="prodi" value="<?= htmlspecialchars($mhs['prodi']); ?>" required>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($mhs['alamat']); ?>" required>

            <label for="noHP">Nomor HP</label>
            <input type="text" id="noHP" name="noHP" value="<?= htmlspecialchars($mhs['noHP']); ?>" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="viewmahasiswa.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
