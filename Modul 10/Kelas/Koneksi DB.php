<?php
class KoneksiDB {
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dbkampus";

    private $conn = null;
    private $errors = [];

    // Constructor otomatis mencoba koneksi
    public function __construct() {
        $this->connect();
    }

    // Fungsi koneksi
    public function connect() {
        if ($this->conn === null) {
            $this->conn = @mysqli_connect($this->host, $this->username, $this->password, $this->database);

            if (!$this->conn) {
                $this->errors[] = mysqli_connect_error();
                return false;
            }

            mysqli_set_charset($this->conn, "utf8");
            return true;
        }
        return true;
    }

    // Fungsi cek status koneksi
    public function isConnected() {
        return $this->conn !== null;
    }

    // Fungsi menutup koneksi
    public function disconnect() {
        if ($this->conn !== null) {
            mysqli_close($this->conn);
            $this->conn = null;
        }
    }

    // Ambil error
    public function getErrors() {
        return $this->errors;
    }
}
?>
