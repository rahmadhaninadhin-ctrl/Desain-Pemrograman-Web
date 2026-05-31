<?php
require_once "Database.php";

$db = new Database();

// Ambil idDosen dari URL
if (!isset($_GET['idDosen'])) {
    header("Location: viewdosen.php");
    exit;
}

$idDosen = $_GET['idDosen'];

// Ambil data lama untuk ditampilkan di form
$stmt = $db->prepare("SELECT * FROM t_dosen WHERE idDosen = ?");
$stmt->bind_param("i", $idDosen);
$stmt->execute();
$result = $stmt->get_result();
$dosen = $result->fetch_assoc();

if (!$dosen) {
    header("Location: viewdosen.php");
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaDosen = $_POST['namaDosen'];
    $noHP      = $_POST['noHP'];

    $stmt = $db->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
    $stmt->bind_param("ssi", $namaDosen, $noHP, $idDosen);

    if ($stmt->execute()) {
        header("Location: viewdosen.php?status=success");
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
    <title>Edit Dosen - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">SIAKAD <span>Dosen</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </div>

    <div class="page-header">
        <h1>Edit Data Dosen</h1>
        <p>Perbarui informasi dosen di sistem akademik</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">Perubahan Data Dosen</div>
        <form method="POST" class="form-card">
            <input type="hidden" name="idDosen" value="<?= htmlspecialchars($dosen['idDosen']); ?>">

            <label for="namaDosen">Nama Dosen</label>
            <input type="text" id="namaDosen" name="namaDosen" value="<?= htmlspecialchars($dosen['namaDosen']); ?>" required>

            <label for="noHP">Nomor HP</label>
            <input type="text" id="noHP" name="noHP" value="<?= htmlspecialchars($dosen['noHP']); ?>" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="viewdosen.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
