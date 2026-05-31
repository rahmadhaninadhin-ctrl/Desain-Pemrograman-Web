<?php
class Database {
    private $host  = "localhost";
    private $user  = "root";
    private $pass  = "";        // sesuaikan dengan konfigurasi MySQL/XAMPP kamu
    private $db    = "akademik";
    private $con;

    public function __construct() {
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->con->connect_error) {
            die("Koneksi database gagal: " . $this->con->connect_error);
        }
        $this->con->set_charset("utf8"); // penting untuk data teks
    }

    public function getConnection() {
        return $this->con;
    }
}
?>
