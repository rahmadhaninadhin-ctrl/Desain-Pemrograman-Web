<?php
require_once "Database.php";

$db = new Database();

// cek kodeMK dari URL
if (!isset($_GET['kodeMK'])) {
    header("Location: viewmatakuliah.php?status=error&msg=Kode MK tidak valid");
    exit;
}

$kodeMK = $_GET['kodeMK'];

// query hapus data dengan prepared statement
$stmt = $db->prepare("DELETE FROM t_matakuliah WHERE kodeMK = ?");
$stmt->bind_param("s", $kodeMK); // gunakan "s" jika kodeMK bertipe VARCHAR

if ($stmt->execute()) {
    // redirect dengan pesan sukses
    header("Location: viewmatakuliah.php?status=success&msg=Data mata kuliah berhasil dihapus");
    exit;
} else {
    // redirect dengan pesan error
    header("Location: viewmatakuliah.php?status=error&msg=Gagal menghapus data");
    exit;
}
?>
