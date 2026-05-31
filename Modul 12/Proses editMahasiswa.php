<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

if (isset($_POST['edit'])) {
    $npm     = trim($_POST['npm']);
    $namaMhs = trim($_POST['namaMhs']);
    $prodi   = trim($_POST['prodi']);
    $alamat  = trim($_POST['alamat']);
    $noHP    = trim($_POST['noHP']);

    $stmt = $con->prepare("UPDATE t_mahasiswa 
                           SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ? 
                           WHERE npm = ?");
    $stmt->bind_param("sssss", $namaMhs, $prodi, $alamat, $noHP, $npm);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: viewmahasiswa.php?status=success_edit&msg=Data mahasiswa berhasil diperbarui");
        exit;
    } else {
        $stmt->close();
        $con->close();
        header("Location: viewmahasiswa.php?status=error_edit&msg=Gagal memperbarui data");
        exit;
    }
} else {
    header("Location: viewmahasiswa.php?status=invalid_access");
    exit;
}
?>
