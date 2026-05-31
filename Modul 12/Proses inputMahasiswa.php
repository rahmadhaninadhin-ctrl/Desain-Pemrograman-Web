<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

if (isset($_POST['tambah'])) {
    $npm     = trim($_POST['npm']);
    $namaMhs = trim($_POST['namaMhs']);
    $prodi   = trim($_POST['prodi']);
    $alamat  = trim($_POST['alamat']);
    $noHP    = trim($_POST['noHP']);

    $stmt = $con->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $npm, $namaMhs, $prodi, $alamat, $noHP);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: viewmahasiswa.php?status=success_insert&msg=Data mahasiswa berhasil ditambahkan");
        exit;
    } else {
        $stmt->close();
        $con->close();
        header("Location: viewmahasiswa.php?status=error_insert&msg=Gagal menambahkan data");
        exit;
    }
} else {
    header("Location: viewmahasiswa.php?status=invalid_access");
    exit;
}
?>
