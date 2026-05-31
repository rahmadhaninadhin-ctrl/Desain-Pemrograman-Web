<?php
class Manusia {
    protected $nama;
    protected $nik;
    protected $umur;

    // Constructor: langsung isi data
    public function __construct($nama, $nik = "0000000000", $umur = null) {
        $this->nama = $nama;
        $this->nik = $nik;
        $this->umur = $umur;
    }

    // Getter & Setter Nama
    public function setNama($nama) { $this->nama = $nama; }
    public function getNama() { return $this->nama; }

    // Getter & Setter NIK
    public function setNIK($nik) { $this->nik = $nik; }
    public function getNIK() { return $this->nik; }

    // Getter & Setter Umur
    public function setUmur($umur) { $this->umur = $umur; }
    public function getUmur() { return $this->umur; }

    // Ringkasan data manusia
    public function infoManusia() {
        return "Nama: {$this->nama}, NIK: {$this->nik}, Umur: {$this->umur} tahun";
    }
}
?>
