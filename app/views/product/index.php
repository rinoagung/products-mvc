<div class="d-flex row justify-content-center text-center">
    <div class="col-lg-11">
        <?php Flasher::flash(); ?>
    </div>
</div>





<div class="container">
    <div class="d-flex row justify-content-center">
        <?php foreach ($data["barang"] as $b) : ?>

            <div class="card my-4 mx-2 border-0 shadow_box" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img src="<?= BASEURL; ?>img/<?= $b["gambar"]; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <ul class="list-group list-group-flush">
                            <div class="list-group-item">
                                <li class="fw-bold d-flex justify-content-between mt-3">
                                    <span>Berat</span>
                                    <span><?= $b["berat"]; ?> gram</span>
                                </li>

                                <li class="fw-bold d-flex justify-content-between my-3">
                                    <span>Jumlah</span>
                                    <span><?= $b["jumlah"]; ?></span>
                                </li>

                                <li class="fw-bold d-flex justify-content-between mb-3">
                                    <span>Harga</span>
                                    <span>Rp<?= $b["harga"]; ?></span>
                                </li>
                                <li class="fw-bold d-flex justify-content-end border-bottom">
                                    <!-- <li class="border-bottom text-end fw-bold "> -->
                                    <h5 class="card-title text-shadow"><?= $b["nama"]; ?></h5>
                                </li>
                            </div>

                        </ul>
                        <div class="card-body d-flex justify-content-end align-items-end">
                            <a href="<?= BASEURL; ?>product/ubah<?= $b["id"]; ?>" class=" tampilUbah card-link text-decoration-none badge bg-primary me-2" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $b["id"]; ?>">Ubah</a>

                            <form action="<?= BASEURL; ?>product/hapus/" method="POST">
                                <input type="hidden" name="hapus_id" value="<?= $b["id"]; ?>">
                                <input type="hidden" name="hapus_gambar" value="<?= $b["gambar"]; ?>">
                                <button type="submit" name="hapus" class="border-0 card-link badge bg-danger" onclick="return confirm('Yakin?')" ;>Hapus</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>Product/ubah" method="POST" enctype="multipart/form-data" class="col">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="gambar" id="gambar">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>


                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <!-- <input type="hidden" id="gambarteks" name="gamberteks"> -->
                        <input class="form-control" id="gambar" name="gambar" type="file">
                    </div>
                    <label for="berat" class="form-label">Berat Produk</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Berat">
                        <span class="input-group-text">Gram</span>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <label for="harga" class="form-label">Harga Produk</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>

                </form>


            </div>
        </div>
    </div>