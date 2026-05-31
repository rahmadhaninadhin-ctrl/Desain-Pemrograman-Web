<?php
require_once "Database.php";

$db = new Database();

// cek npm dari URL
if (!isset($_GET['npm'])) {
    header("Location: viewmahasiswa.php?status=error&msg=NPM tidak valid");
    exit;
}

$npm = $_GET['npm'];

// query hapus data dengan prepared statement
$stmt = $db->prepare("DELETE FROM t_mahasiswa WHERE npm = ?");
$stmt->bind_param("s", $npm); // gunakan "s" jika npm bertipe VARCHAR

if ($stmt->execute()) {
    // redirect dengan pesan sukses
    header("Location: viewmahasiswa.php?status=success&msg=Data mahasiswa berhasil dihapus");
    exit;
} else {
    // redirect dengan pesan error
    header("Location: viewmahasiswa.php?status=error&msg=Gagal menghapus data");
    exit;
}
?>
