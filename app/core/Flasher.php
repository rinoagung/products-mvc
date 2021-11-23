<?php
class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION["flash"] = [
            "pesan" => $pesan,
            "aksi" => $aksi,
            "tipe" => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION["flash"])) {

            echo '<div class="alert alert-' . $_SESSION["flash"]["tipe"] . ' alert-dismissible fade show" role="alert">
                Data Barang
                <strong>' . $_SESSION["flash"]["pesan"] . " " . '</strong>' . $_SESSION["flash"]["aksi"] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION["flash"]);
        }
    }


    public static function setFlashGambar($tipe)
    {
        $_SESSION["tipe"] = $tipe;
    }
    public static function flashGambar()
    {
        if (isset($_SESSION["tipe"])) {
            if ($_SESSION["tipe"] === "tambah") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Pilih
                <strong> gambar </strong>terlebih dahulu
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if ($_SESSION["tipe"] === "ekstensi") {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Format yang didukung =
                <strong> jpg, jpeg, png</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if ($_SESSION["tipe"] === "ukuran") {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Ukuran gambar terlalu 
                <strong> besar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            unset($_SESSION["tipe"]);
        }
    }
}
