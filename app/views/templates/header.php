<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data["judul"]; ?></title>

    <link rel="stylesheet" href="<?= BASEURL; ?>css/style.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <!-- link icon -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <!-- akhir link icon -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">Products</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $data["judul"] == "Home" || $data["judul"] == "Daftar Produk" ? "active border-bottom border-primary border-4" : ""; ?>" aria-current="page" href="<?= BASEURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $data["judul"] == "About" ? "active border-bottom border-primary border-4" : ""; ?>" href="<?= BASEURL; ?>about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $data["judul"] == "Tambah Produk" ? "active border-bottom border-primary border-4" : ""; ?>" href="<?= BASEURL; ?>product/tambah">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $data["judul"] == "Contact" ? "active border-bottom border-primary border-4" : ""; ?>" href="#">Contact</a>
                    </li>
                </ul>
                <form action="<?= BASEURL; ?>product/cari" class="d-flex align-items-center" method="POST">
                    <input class="form-control me-2 keyword" name="keyword" autofocus type="text" placeholder="Search" autocomplete="off" aria-label="Search">
                    <button class="rounded-3 btn btn-primary btn-sm tombol-cari" name="cari" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <div style="margin-bottom: 6rem;"></div>