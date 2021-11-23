<?php

class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];


    public function __construct()
    {
        $url = $this->parseURL();

        if ($url == null) { // cek jika $url == null, maka akan diisi "home"
            $url = [$this->controller];
        }

        if (file_exists("../app/controllers/" . $url[0] . ".php")) { // "file_exists" merupakan fungsi untuk cek apakah ada filenya
            $this->controller = $url[0];
            unset($url[0]); // menghapus berdasarkan index
        }
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) { // "method_exists" merupakan fungsi untuk cek apakah ada object-nya
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/"); // menghapus tanda "/" di akhir url
            $url = filter_var($url, FILTER_SANITIZE_URL); // membersihkan karakter2 asing di url
            $url = explode("/", $url); // memecah url berdasarkan tanda "/" dan berubah menjadi array
            return $url;
        }
    }
}
