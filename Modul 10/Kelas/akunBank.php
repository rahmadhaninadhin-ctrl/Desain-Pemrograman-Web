<?php
class AkunBank {
    protected $accountNumber;
    protected $saldo;
    protected $nama;

    public function __construct($nomorAkun, $nominal, $nama = "Tanpa Nama") {
        $this->accountNumber = $nomorAkun;
        $this->saldo = $nominal;
        $this->nama = $nama;
    }

    // Getter & Setter
    public function getNama() { return $this->nama; }
    public function setNama($nama) { $this->nama = $nama; }

    public function getAccountNumber() { return $this->accountNumber; }

    public function getSaldo() { return $this->saldo; }
    public function setSaldo($saldo) { $this->saldo = $saldo; }

    // Operasi saldo
    public function tambahUang($nominal) {
        $this->saldo += $nominal;
        return $this->saldo;
    }

    public function kurangiUang($nominal) {
        if ($this->saldo >= $nominal) {
            $this->saldo -= $nominal;
        } else {
            return "Saldo tidak mencukupi!";
        }
        return $this->saldo;
    }

    public function hitungPajak() {
        return $this->saldo * 0.11; // pajak 11%
    }

    // Ringkasan akun
    public function infoAkun() {
        return "Akun: {$this->accountNumber}, Nama: {$this->nama}, Saldo: Rp{$this->saldo}";
    }
}
?>
