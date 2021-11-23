<?php
class Functions_model
{
    private $table = "barang";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getProductById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahDataProduk($data)
    {
        // $gambar = $data["gambar"];
        $query = "INSERT INTO barang VALUES (null, :nama, :berat, :jumlah, :harga, :gambar)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('berat', $data['berat']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar', $data['gambar']);

        $this->db->execute();

        return $this->db->rowHitung();
    }

    public function hapusDataProduk($id)
    {
        $query = "DELETE FROM barang WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->rowHitung();
    }


    public function ubahDataProduk($data)
    {
        // $gambar = $data["gambar"];
        $query = "UPDATE barang SET 
        nama = :nama,
        berat  = :berat,
        jumlah  = :jumlah,
        harga  = :harga,
        gambar  = :gambar
        WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('berat', $data['berat']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowHitung();
    }

    public function cariDataProducts()
    {
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM barang WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->resultSet();
    }
}
