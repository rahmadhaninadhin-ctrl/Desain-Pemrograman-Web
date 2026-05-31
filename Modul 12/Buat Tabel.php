<?php
$con = new mysqli("localhost", "root", "", "akademik");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$q = "CREATE TABLE IF NOT EXISTS t_login (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$hasil = $con->query($q);

if ($hasil === TRUE){
    echo "Tabel t_login berhasil dibuat";
} else {
    echo "Tabel gagal dibuat: ". $con->error;
}

// menutup koneksi
$con->close();
?>