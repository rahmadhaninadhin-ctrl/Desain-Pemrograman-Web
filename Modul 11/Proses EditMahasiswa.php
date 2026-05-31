<?php
require_once "koneksi.php";

if (isset($_POST['update'])) {
    $npm       = mysqli_real_escape_string($conn, $_POST['npm']);
    $namaMhs   = mysqli_real_escape_string($conn, $_POST['namaMhs']);
    $prodi     = mysqli_real_escape_string($conn, $_POST['prodi']);
    $alamat    = mysqli_real_escape_string($conn, $_POST['alamat']);
    $noHP      = mysqli_real_escape_string($conn, $_POST['noHP']);

    // query update data mahasiswa
    $sql = "UPDATE t_mahasiswa 
            SET namaMhs='$namaMhs', prodi='$prodi', alamat='$alamat', noHP='$noHP' 
            WHERE npm='$npm'";
    $update = mysqli_query($conn, $sql);

    if (!$update) {
        die("Gagal mengupdate data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewmahasiswa.php?status=success&msg=Data mahasiswa berhasil diperbarui");
    exit;
} else {
    // jika tombol update tidak ditekan
    header("Location: viewmahasiswa.php?status=error&msg=Form tidak valid");
    exit;
}
?>
