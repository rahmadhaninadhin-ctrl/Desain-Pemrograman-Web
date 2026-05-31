<?php
require_once "Manusia.php";

class Mahasiswa extends Manusia {
    protected $NIM;
    protected $jurusan;
    protected $kelas;
    protected $angkatan;

    // Constructor: bisa langsung isi data
    public function __construct($nama, $nim = null, $jurusan = null, $kelas = null, $angkatan = null) {
        $this->setNama($nama);
        $this->NIM = $nim;
        $this->jurusan = $jurusan;
        $this->kelas = $kelas;
        $this->angkatan = $angkatan;
    }

    // Getter & Setter NIM
    public function setNIM($nim) { $this->NIM = $nim; }
    public function getNIM() { return $this->NIM; }

    // Getter & Setter Jurusan
    public function setJurusan($jurusan) { $this->jurusan = $jurusan; }
    public function getJurusan() { return $this->jurusan; }

    // Getter & Setter Kelas
    public function setKelas($kelas) { $this->kelas = $kelas; }
    public function getKelas() { return $this->kelas; }

    // Getter & Setter Angkatan
    public function setAngkatan($angkatan) { $this->angkatan = $angkatan; }
    public function getAngkatan() { return $this->angkatan; }

    // Ringkasan data mahasiswa
    public function infoMahasiswa() {
        return "Nama: {$this->getNama()}, NIM: {$this->NIM}, Jurusan: {$this->jurusan}, Kelas: {$this->kelas}, Angkatan: {$this->angkatan}";
    }
}
?>
