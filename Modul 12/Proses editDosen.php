<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

if (isset($_POST['edit'])) {
    $idDosen   = intval($_POST['idDosen']);
    $namaDosen = trim($_POST['namaDosen']);
    $noHP      = trim($_POST['noHP']);

    $stmt = $con->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
    $stmt->bind_param("ssi", $namaDosen, $noHP, $idDosen);

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        header("Location: viewdosen.php?status=success_edit&msg=Data dosen berhasil diperbarui");
        exit;
    } else {
        $stmt->close();
        $con->close();
        header("Location: viewdosen.php?status=error_edit&msg=Gagal memperbarui data");
        exit;
    }
} else {
    header("Location: viewdosen.php?status=invalid_access");
    exit;
}
?>
