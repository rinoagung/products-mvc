<?php
class Home extends Controller
{
    public function index()
    {
        $data["judul"] = "Home";
        $data["barang"] = $this->model("Functions_model")->getAllProducts();
        $this->view("templates/header", $data);
        $this->view("product/index", $data);
        $this->view("templates/footer");
    }
}
