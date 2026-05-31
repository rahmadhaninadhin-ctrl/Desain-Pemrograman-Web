<?php
require_once "koneksi.php";

if (isset($_POST['simpan'])) {
    $nidn      = mysqli_real_escape_string($conn, $_POST['nidn']);
    $namaDosen = mysqli_real_escape_string($conn, $_POST['namaDosen']);
    $noHP      = mysqli_real_escape_string($conn, $_POST['noHP']);

    // query insert data dosen
    $sql = "INSERT INTO t_dosen (nidn, namaDosen, noHP) 
            VALUES ('$nidn', '$namaDosen', '$noHP')";
    $insert = mysqli_query($conn, $sql);

    if (!$insert) {
        die("Gagal menyimpan data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewdosen.php?status=success&msg=Data dosen berhasil ditambahkan");
    exit;
} else {
    // jika tombol simpan tidak ditekan
    header("Location: inputdosen.php?status=error&msg=Form tidak valid");
    exit;
}
?>
