<?php
class Buku {
    private string $judul;
    private int $stok;

    public function __construct(string $judul, int $stok) {
        $this->judul = $judul;
        $this->stok = $stok;
    }

    public function getJudul(): string {
        return $this->judul;
    }

    public function getStok(): int {
        return $this->stok;
    }

    public function kurangiStok(): bool {
        if ($this->stok > 0) {
            $this->stok--;
            return true;
        }
        return false;
    }
}

class Pengunjung {
    private string $nama;
    private string $nim;

    public function __construct(string $nama, string $nim) {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getNim(): string {
        return $this->nim;
    }
}

class PenjagaPerpustakaan {
    private string $namaPenjaga;

    public function __construct(string $namaPenjaga) {
        $this->namaPenjaga = $namaPenjaga;
    }

    public function prosesPeminjaman(Pengunjung $pengunjung, Buku $buku): void {
        echo "Petugas: {$this->namaPenjaga}<br>";
        echo "Mencari buku: '{$buku->getJudul()}'...<br>";

        if ($buku->kurangiStok()) {
            // Menggunakan format Hari dan Tanggal (l, d-m-Y)
            $tglPinjam = date('l, d-m-Y');
            $tglKembali = date('l, d-m-Y', strtotime('+7 days'));
            $status = "Sudah dikembalikan";

            echo "STATUS: PEMINJAMAN BERHASIL<br><br>";
            echo "Nama Peminjam     : " . $pengunjung->getNama() . "<br>";
            echo "NIM Peminjam      : " . $pengunjung->getNim() . "<br>";
            echo "Nama Buku         : " . $buku->getJudul() . "<br>";
            echo "Tanggal Pinjam    : " . $tglPinjam . "<br>";
            echo "Tanggal Kembali   : " . $tglKembali . "<br>";
            echo "Status Peminjaman : " . $status . "<br>";
        } else {
            echo "STATUS: PEMINJAMAN GAGAL<br><br>";
            echo "Maaf, buku '" . $buku->getJudul() . "' tidak tersedia (Stok Habis).<br>";
        }
        echo "-----<br><br>";
    }
}

// Implementasi
$petugas = new PenjagaPerpustakaan("Pak Made");
$parama = new Pengunjung("Gede Parama Arya Satya", "250030622");

// Jika Buku Tersedia
echo "-- Jika Buku Ada --<br>";
$bukuAda = new Buku("Secrets of the Dragon", 1);
$petugas->prosesPeminjaman($parama, $bukuAda);

// Jika Buku Tidak Tersedia
echo "-- Jika Buku Tidak Ada --<br>";
$bukuHabis = new Buku("Secrets of the Dragon", 0);
$petugas->prosesPeminjaman($parama, $bukuHabis);

?>
