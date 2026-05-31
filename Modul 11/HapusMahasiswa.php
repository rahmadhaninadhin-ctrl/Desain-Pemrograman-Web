<?php
require_once "koneksi.php";

// cek npm dari URL
if (isset($_GET['npm'])) {
    $npm = mysqli_real_escape_string($conn, $_GET['npm']);

    // query hapus data
    $sql = "DELETE FROM t_mahasiswa WHERE npm = '$npm'";
    $hapus = mysqli_query($conn, $sql);

    if (!$hapus) {
        die("Gagal menghapus data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewmahasiswa.php?status=success&msg=Data mahasiswa berhasil dihapus");
    exit;
} else {
    // jika tidak ada npm di URL
    header("Location: viewmahasiswa.php?status=error&msg=NPM tidak valid");
    exit;
}
?>
