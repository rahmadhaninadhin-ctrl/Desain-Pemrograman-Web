<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

if (isset($_POST['tambah'])) {
    $namaDosen = trim($_POST['namaDosen']);
    $noHP      = trim($_POST['noHP']);

    $stmt = $con->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
    $stmt->bind_param("ss", $namaDosen, $noHP);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: viewdosen.php?status=success_insert&msg=Data dosen berhasil ditambahkan");
        exit;
    } else {
        $stmt->close();
        $con->close();
        header("Location: viewdosen.php?status=error_insert&msg=Gagal menambahkan data");
        exit;
    }
} else {
    header("Location: viewdosen.php?status=invalid_access");
    exit;
}
?>
