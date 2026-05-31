<?php
require_once "koneksi.php";

// cek idDosen dari URL
if (isset($_GET['idDosen'])) {
    $id = intval($_GET['idDosen']);

    // query hapus data
    $sql = "DELETE FROM t_dosen WHERE idDosen = $id";
    $hapus = mysqli_query($conn, $sql);

    if (!$hapus) {
        die("Gagal menghapus data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewdosen.php?status=success&msg=Data dosen berhasil dihapus");
    exit;
} else {
    // jika tidak ada idDosen di URL
    header("Location: viewdosen.php?status=error&msg=ID tidak valid");
    exit;
}
?>
