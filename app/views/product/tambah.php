<div class="d-flex row justify-content-center text-center">
    <div class="col-lg-11">
        <?php Flasher::flashGambar(); ?>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col">
            <h5 class="modal-title mt-4" id="judulModal">Tambah Data Produk</h5>
        </div>
    </div>



    <div class="row justify-content-center" id="formModal" aria-labelledby="judulModal">
        <form action="<?= BASEURL; ?>product/tambahBaru" method="POST" enctype="multipart/form-data" class="col-md-5 mt-5">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
            </div>


            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" id="gambar" name="gambar" type="file">
            </div>
            <label for="berat" class="form-label">Berat Produk</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" min="0" id="berat" name="berat" placeholder="Berat" required>
                <span class="input-group-text">Gram</span>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Produk</label>
                <input type="number" class="form-control" id="jumlah" min="0" name="jumlah" placeholder="Jumlah" required>
            </div>
            <label for="harga" class="form-label">Harga Produk</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input type="number" class="form-control" min="0" id="harga" name="harga" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>

        </form>
    </div>

</div>