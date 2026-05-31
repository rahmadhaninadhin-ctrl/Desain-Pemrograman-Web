<?php
require_once "koneksi.php";

if (isset($_POST['simpan'])) {
    $npm      = mysqli_real_escape_string($conn, $_POST['npm']);
    $namaMhs  = mysqli_real_escape_string($conn, $_POST['namaMhs']);
    $prodi    = mysqli_real_escape_string($conn, $_POST['prodi']);
    $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);
    $noHP     = mysqli_real_escape_string($conn, $_POST['noHP']);

    // query insert data mahasiswa
    $sql = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) 
            VALUES ('$npm', '$namaMhs', '$prodi', '$alamat', '$noHP')";
    $insert = mysqli_query($conn, $sql);

    if (!$insert) {
        die("Gagal menyimpan data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewmahasiswa.php?status=success&msg=Data mahasiswa berhasil ditambahkan");
    exit;
} else {
    // jika tombol simpan tidak ditekan
    header("Location: inputmahasiswa.php?status=error&msg=Form tidak valid");
    exit;
}
?>
