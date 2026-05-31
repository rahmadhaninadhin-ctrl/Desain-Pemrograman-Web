<?php
require_once "koneksi.php";

if (isset($_POST['simpan'])) {
    $kodeMK   = mysqli_real_escape_string($conn, $_POST['kodeMK']);
    $namaMK   = mysqli_real_escape_string($conn, $_POST['namaMK']);
    $sks      = mysqli_real_escape_string($conn, $_POST['sks']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    // query insert data mata kuliah
    $sql = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, semester) 
            VALUES ('$kodeMK', '$namaMK', '$sks', '$semester')";
    $insert = mysqli_query($conn, $sql);

    if (!$insert) {
        die("Gagal menyimpan data: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // redirect dengan pesan sukses
    header("Location: viewmatakuliah.php?status=success&msg=Data mata kuliah berhasil ditambahkan");
    exit;
} else {
    // jika tombol simpan tidak ditekan
    header("Location: inputmatakuliah.php?status=error&msg=Form tidak valid");
    exit;
}
?>
