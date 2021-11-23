<?php
class Product extends Controller
{
    public function index()
    {
        $data["judul"] = "Home";
        $data["barang"] = $this->model("Functions_model")->getAllProducts();
        $this->view("templates/header", $data);
        $this->view("product/index", $data);
        $this->view("templates/footer");
    }

    public function tambah()
    {
        $data["judul"] = "Tambah Produk";
        // $data["barang"] = $this->model("Functions_model")->getAllProducts();
        $this->view("templates/header", $data);
        $this->view("product/tambah", $data);
        $this->view("templates/footer");
    }

    public function upload()
    {
        $namaFile = $_FILES["gambar"]["name"]; // gabungan nama, ekstensi file (png, jpeg, dll)
        $ukuranFile = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"]; // untuk mengetahui apakah ada gambar yang di upload
        $tmpName = $_FILES["gambar"]["tmp_name"];

        // cek apakah gambar di upload
        if ($error === 4) {
            Flasher::setFlashGambar("tambah");
            header("location: " . BASEURL . "product/tambah");

            return false;
        }

        // cek apakah yang di upload gambar
        $ekstensiGambarValid = ["jpg", "jpeg", "png"];
        $ekstensiGambar = explode(".", $namaFile); // explode yaitu mengubah string jadi array (nama.jpg) => (nama, jpg)
        $ekstensiGambar = strtolower(end($ekstensiGambar)); // strtolower => mengubah string ke lower // end => mengambil array paling belakang juka lebih dari satu dimensi

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) { // in_array => mencari jarum di dalam jerami (jarum, jerami)
            Flasher::setFlashGambar("ekstensi");
            header("location: " . BASEURL . "product/tambah");

            return false;
        }
        if ($ukuranFile > 1000000) {
            Flasher::setFlashGambar("ukuran");
            header("location: " . BASEURL . "product/tambah");
            return false;
        }


        // lolos pengecekan, gambar dapat di upload
        // generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= ".";
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, __DIR__ . '/../../public/img/' . $namaFileBaru);
        return $namaFileBaru;
    }




    public function tambahBaru()
    {
        $_POST["gambar"] = $this->upload();
        if ($this->model("Functions_model")->tambahDataProduk($_POST) > 0) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
            header("location: " . BASEURL . "product");
            exit;
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
            header("location: " . BASEURL . "product");
            exit;
        }
    }


    public function hapusGambar($gambar)
    {
        unlink(__DIR__ . "/../../public/img/" . $gambar);
    }

    public function hapus()
    {
        $this->hapusGambar($_POST["hapus_gambar"]);
        if ($this->model("Functions_model")->hapusDataProduk($_POST["hapus_id"]) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
            header("location: " . BASEURL . "product");
            exit;
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
            header("location: " . BASEURL . "product");
            exit;
        }
    }





    public function getUbah()
    {
        echo json_encode($this->model("Functions_model")->getProductById($_POST["id"]));
    }

    public function ubah()
    {
        $error = $_FILES["gambar"]["error"]; // untuk mengetahui apakah ada gambar yang di upload
        if ($error !== 4) {
            $this->hapusGambar($_POST["gambar"]);
            $_POST["gambar"] = $this->upload();
        }
        if ($this->model("Functions_model")->ubahDataProduk($_POST) > 0) {
            Flasher::setFlash("berhasil", "diubah", "success");
            header("location: " . BASEURL . "product");
            exit;
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
            header("location: " . BASEURL . "product");
            exit;
        }
    }

    public function cari()

    {
        $data["judul"] = "Daftar Produk";
        $data["barang"] = $this->model("Functions_model")->cariDataProducts();
        $this->view("templates/header", $data);
        $this->view("product/index", $data);
        $this->view("templates/footer");
    }
}
