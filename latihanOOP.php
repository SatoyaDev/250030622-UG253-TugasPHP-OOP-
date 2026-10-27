<?php
class Mahasiswa {
    public string $nama;
    public string $nim;
    private float $nilai = 0;

    public function __construct(string $nama, string $nim) {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function setNilai(float $nilai): bool {
        if ($nilai >= 0 && $nilai <= 100) {
            $this->nilai = $nilai;
            return true;
        }
        return false;
    }

    public function getNilai(): float {
        return $this->nilai;
    }

    public function getPredikat(): string {
        if ($this->nilai >= 85) {
            return 'A';
        } elseif ($this->nilai >= 70) {
            return 'B';
        } elseif ($this->nilai >= 55) {
            return 'C';
        } else {
            return 'D';
        }
    }
}

// Implementasi Valid
echo "==Uji Coba Valid==\n\n";
$mhs1 = new Mahasiswa("Budi Santoso", "2200101");
echo "Mahasiswa: {$mhs1->nama} ({$mhs1->nim})\n";

$inputNilai = 88;

if ($mhs1->setNilai($inputNilai)) {
    echo "Set Nilai ($inputNilai): Berhasil\n";
    echo "Nilai Akhir: " . $mhs1->getNilai() . "\n";
    echo "Predikat   : " . $mhs1->getPredikat() . "\n";
} else {
    echo "Set Nilai ($inputNilai): Gagal (Nilai di luar jangkauan 0 - 100)\n";
}

echo "\n-----------------------------------\n\n";

// Implementasi Tidak Valid Nilai Lebih
echo "==Uji Coba Tidak Valid Nilai Lebih==\n\n";
$mhs2 = new Mahasiswa("Siti Rahma", "2200102");
echo "Mahasiswa: {$mhs2->nama} ({$mhs2->nim})\n";

$inputNilaiInvalid = 120;

if ($mhs2->setNilai($inputNilaiInvalid)) {
    echo "Set Nilai ($inputNilaiInvalid): Berhasil\n";
    echo "Nilai Akhir: " . $mhs2->getNilai() . "\n";
    echo "Predikat   : " . $mhs2->getPredikat() . "\n";
} else {
    echo "Set Nilai ($inputNilaiInvalid): Gagal (Nilai harus di antara 0 - 100)\n";
    echo "Nilai Default: " . $mhs2->getNilai() . "\n";
    echo "Predikat     : " . $mhs2->getPredikat() . "\n";
}

echo "\n-----------------------------------\n\n";

// Implementasi Tidak Valid Nilai Minus
echo "==Uji Coba Tidak Valid Nilai Minus==\n\n";
// 3. Uji Coba Nilai Tidak Valid (Negatif)
$mhs3 = new Mahasiswa("Andi Pratama", "2200103");
echo "Mahasiswa: {$mhs3->nama} ({$mhs3->nim})\n";

$inputNilaiNegatif = -15;

if ($mhs3->setNilai($inputNilaiNegatif)) {
    echo "Set Nilai ($inputNilaiNegatif): Berhasil\n";
} else {
    echo "Set Nilai ($inputNilaiNegatif): Gagal (Nilai harus di antara 0 - 100)\n";
}

?>