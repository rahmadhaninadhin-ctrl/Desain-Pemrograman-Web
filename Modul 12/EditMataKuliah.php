<?php
require_once "Database.php";

$db = new Database();

// Ambil kodeMK dari URL
if (isset($_GET['kodeMK'])) {
    $kodeMK = intval($_GET['kodeMK']);

    // Ambil data lama untuk ditampilkan di form
    $stmt = $db->prepare("SELECT * FROM t_matakuliah WHERE kodeMK = ?");
    $stmt->bind_param("i", $kodeMK);
    $stmt->execute();
    $result = $stmt->get_result();
    $mk = $result->fetch_assoc();

    if (!$mk) {
        header("Location: viewmatakuliah.php");
        exit;
    }
} else {
    header("Location: viewmatakuliah.php");
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaMK = $_POST['namaMK'];
    $sks    = $_POST['sks'];
    $jam    = $_POST['jam'];

    $stmt = $db->prepare("UPDATE t_matakuliah SET namaMK = ?, sks = ?, jam = ? WHERE kodeMK = ?");
    $stmt->bind_param("siii", $namaMK, $sks, $jam, $kodeMK);

    if ($stmt->execute()) {
        header("Location: viewmatakuliah.php?status=success");
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
    <title>Edit Mata Kuliah - SIAKAD</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">SIAKAD <span>Mata Kuliah</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">Mata Kuliah</a></li>
        </ul>
    </div>

    <div class="page-header">
        <h1>Edit Data Mata Kuliah</h1>
        <p>Perbarui informasi mata kuliah di sistem akademik</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">Perubahan Data Mata Kuliah</div>
        <form method="POST" class="form-card">
            <input type="hidden" name="kodeMK" value="<?= htmlspecialchars($mk['kodeMK']); ?>">

            <label for="namaMK">Nama Mata Kuliah</label>
            <input type="text" id="namaMK" name="namaMK" value="<?= htmlspecialchars($mk['namaMK']); ?>" required>

            <label for="sks">SKS</label>
            <input type="number" id="sks" name="sks" value="<?= htmlspecialchars($mk['sks']); ?>" required>

            <label for="jam">Jam</label>
            <input type="number" id="jam" name="jam" value="<?= htmlspecialchars($mk['jam']); ?>" required>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="viewmatakuliah.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?= date("Y"); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
