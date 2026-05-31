<?php
class Buah {
    public $nama;
    protected $warna;
    private $bobot;

    // Setter Nama (public)
    public function setNama($n) { 
        $this->nama = $n;
    }

    // Setter Warna (protected)
    protected function setWarna($w) {
        $this->warna = $w;
    }

    // Setter Bobot (private)
    private function setBobot($b) {
        $this->bobot = $b;
    }

    // Getter Warna (public wrapper)
    public function getWarna() {
        return $this->warna;
    }

    // Getter Bobot (public wrapper)
    public function getBobot() {
        return $this->bobot;
    }

    // Ringkasan data buah
    public function infoBuah() {
        return "Nama: {$this->nama}, Warna: {$this->warna}, Bobot: {$this->bobot} gram";
    }
}

// Uji coba
$mango = new Buah();
$mango->setNama("Mangga");
// akses warna & bobot lewat setter protected/private tidak bisa langsung,
// tapi bisa diisi lewat subclass atau setter public tambahan.
// untuk demo, kita isi manual lewat refleksi (atau bisa diatur di subclass).
?>
