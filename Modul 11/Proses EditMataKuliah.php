<?php
require_once "koneksi.php";

if (isset($_POST['update'])) {
    $kodeMK   = mysqli_real_escape_string($conn, $_POST['kodeMK']);
    $namaMK   = mysqli_real_escape_string($conn, $_POST['namaMK']);
    $sks      = mysqli_real_escape_string($conn, $_POST['sks']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    // query update data mata kuliah
    $sql = "UPDATE t_matakuliah 
            SET namaMK='$namaMK', sks='$sks', semester='$semester' 
            WHERE kodeMK='$kodeMK'";
    $update = mysqli_query($conn, $sql);

    if (!$update) {
        die("Gagal mengupdate data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewmatakuliah.php?status=success&msg=Data mata kuliah berhasil diperbarui");
    exit;
} else {
    // jika tombol update tidak ditekan
    header("Location: viewmatakuliah.php?status=error&msg=Form tidak valid");
    exit;
}
?>
