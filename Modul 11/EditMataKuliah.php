<?php
require_once "koneksi.php";

// cek idMatakuliah dari URL
if (isset($_GET['idMatakuliah'])) {
    $id = intval($_GET['idMatakuliah']);
    $sql = "SELECT * FROM t_matakuliah WHERE idMatakuliah = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        header("Location: viewmatakuliah.php?status=error&msg=Data tidak ditemukan");
        exit;
    }
} else {
    header("Location: viewmatakuliah.php?status=error&msg=ID tidak valid");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data Mata Kuliah</h1>
    <form action="proses_editmatakuliah.php" method="post">
        <input type="hidden" name="idMatakuliah" value="<?= $data['idMatakuliah'] ?>">

        <label for="namaMK">Nama Mata Kuliah</label>
        <input type="text" name="namaMatakuliah" id="namaMK" value="<?= htmlspecialchars($data['namaMatakuliah']) ?>" required>

        <label for="kodeMK">Kode Mata Kuliah</label>
        <input type="text" name="kodeMatakuliah" id="kodeMK" value="<?= htmlspecialchars($data['kodeMatakuliah']) ?>" required>

        <label for="sks">Jumlah SKS</label>
        <input type="number" name="sks" id="sks" value="<?= htmlspecialchars($data['sks']) ?>" required min="1" max="6">

        <div class="form-actions">
            <button type="submit" name="update">💾 Simpan</button>
            <a href="viewmatakuliah.php">← Batal</a>
        </div>
    </form>
</body>
</html>
