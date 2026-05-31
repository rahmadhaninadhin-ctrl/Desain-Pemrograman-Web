<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

if (isset($_POST['tambah'])) {
    $kodeMK = trim($_POST['kodeMK']);
    $namaMK = trim($_POST['namaMK']);
    $sks    = intval($_POST['sks']);
    $jam    = intval($_POST['jam']);

    $stmt = $con->prepare("INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) 
                           VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $kodeMK, $namaMK, $sks, $jam);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: viewmatakuliah.php?status=success_insert&msg=Data mata kuliah berhasil ditambahkan");
        exit;
    } else {
        $stmt->close();
        $con->close();
        header("Location: viewmatakuliah.php?status=error_insert&msg=Gagal menambahkan data");
        exit;
    }
} else {
    header("Location: viewmatakuliah.php?status=invalid_access");
    exit;
}
?>
