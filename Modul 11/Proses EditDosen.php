<?php
require_once "koneksi.php";

if (isset($_POST['update'])) {
    $nidn       = mysqli_real_escape_string($conn, $_POST['nidn']);
    $namaDosen  = mysqli_real_escape_string($conn, $_POST['namaDosen']);
    $telpDosen  = mysqli_real_escape_string($conn, $_POST['telpDosen']);

    // query update data dosen
    $sql = "UPDATE t_dosen 
            SET namaDosen='$namaDosen', telpDosen='$telpDosen' 
            WHERE nidn='$nidn'";
    $update = mysqli_query($conn, $sql);

    if (!$update) {
        die("Gagal mengupdate data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewdosen.php?status=success&msg=Data dosen berhasil diperbarui");
    exit;
} else {
    // jika tombol update tidak ditekan
    header("Location: viewdosen.php?status=error&msg=Form tidak valid");
    exit;
}
?>
