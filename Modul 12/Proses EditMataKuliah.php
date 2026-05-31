<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

if (isset($_POST['edit'])) {
    $kodeMK = trim($_POST['kodeMK']);
    $namaMK = trim($_POST['namaMK']);
    $sks    = intval($_POST['sks']);
    $jam    = intval($_POST['jam']);

    $stmt = $con->prepare("UPDATE t_matakuliah 
                           SET namaMK = ?, sks = ?, jam = ? 
                           WHERE kodeMK = ?");
    $stmt->bind_param("siis", $namaMK, $sks, $jam, $kodeMK);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: viewmatakuliah.php?status=success_edit&msg=Data mata kuliah berhasil diperbarui");
        exit;
    } else {
        $stmt->close();
        $con->close();
        header("Location: viewmatakuliah.php?status=error_edit&msg=Gagal memperbarui data");
        exit;
    }
} else {
    header("Location: viewmatakuliah.php?status=invalid_access");
    exit;
}
?>
