<?php
require_once "koneksi.php";

// cek idDosen dari URL
if (isset($_GET['idDosen'])) {
    $id = intval($_GET['idDosen']);
    $sql = "SELECT * FROM t_dosen WHERE idDosen = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        header("Location: viewdosen.php?status=error&msg=Data tidak ditemukan");
        exit;
    }
} else {
    header("Location: viewdosen.php?status=error&msg=ID tidak valid");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data Dosen</h1>
    <form action="proses_editdosen.php" method="post">
        <input type="hidden" name="idDosen" value="<?= $data['idDosen'] ?>">

        <label for="namaDosen">Nama Dosen</label>
        <input type="text" name="namaDosen" id="namaDosen" value="<?= htmlspecialchars($data['namaDosen']) ?>" required>

        <label for="noHP">No HP</label>
        <input type="tel" name="noHP" id="noHP" value="<?= htmlspecialchars($data['noHP']) ?>" required>

        <div class="form-actions">
            <button type="submit" name="update">💾 Simpan</button>
            <a href="viewdosen.php">← Batal</a>
        </div>
    </form>
</body>
</html>
