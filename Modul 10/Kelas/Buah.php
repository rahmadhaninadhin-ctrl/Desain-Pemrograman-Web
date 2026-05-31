<?php
class Buah {
    public $nama;
    protected $warna;
    private $berat;

    // Setter & Getter Warna
    public function setWarna($warna) {
        $this->warna = $warna;
    }
    public function getWarna() {
        return $this->warna;
    }

    // Setter & Getter Berat
    public function setBerat($berat) {
        $this->berat = $berat;
    }
    public function getBerat() {
        return $this->berat;
    }

    // Ringkasan data buah
    public function infoBuah() {
        return "Nama: {$this->nama}, Warna: {$this->warna}, Berat: {$this->berat} gram";
    }
}

// Uji coba
$mango = new Buah();
$mango->nama = "Mangga";
$mango->setWarna("Kuning");
$mango->setBerat(300);

echo $mango->infoBuah();
?>
