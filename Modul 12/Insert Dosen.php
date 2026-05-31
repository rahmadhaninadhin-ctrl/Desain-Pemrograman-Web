<?php
require_once "Database.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaDosen = $_POST['namaDosen'];
    $noHP      = $_POST['noHP'];

    $stmt = $db->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
    $stmt->bind_param("ss", $namaDosen, $noHP);

    if ($stmt->execute()) {
        header("Location: viewdosen.php?status=success&msg=Data dosen berhasil ditambahkan");
        exit;
    } else {
        header("Location: viewdosen.php?status=error&msg=Gagal menambahkan data");
        exit;
    }
}
?>
