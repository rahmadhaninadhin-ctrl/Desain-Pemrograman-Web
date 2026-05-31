<?php
require_once "koneksi.php";

// cek kodeMK dari URL
if (isset($_GET['kodeMK']) && !empty(trim($_GET['kodeMK']))) {
    $kodeMK = mysqli_real_escape_string($conn, $_GET['kodeMK']);

    // query hapus data
    $sql = "DELETE FROM t_matakuliah WHERE kodeMK = '$kodeMK'";
    $hapus = mysqli_query($conn, $sql);

    if (!$hapus) {
        die("Gagal menghapus data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewmatakuliah.php?status=success&msg=Data mata kuliah berhasil dihapus");
    exit;
} else {
    // jika tidak ada kodeMK di URL
    header("Location: viewmatakuliah.php?status=error&msg=Kode MK tidak valid");
    exit;
}
?>
