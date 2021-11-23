<!-- Kartu -->
<section id="kartu"></section>
<div class="container">
    <div class="d-flex row justify-content-center">
        <?php foreach ($data["barang"] as $b) : ?>
            <div class="col-md-4 d-flex justify-content-center mt-5">
                <div class="card border border-1 border-dark" style="width: 20rem;">
                    <img src="img/<?= $b["gambar"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-end"><?= $b["nama"]; ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="fw-bold d-flex justify-content-between align-items-center">
                                Berat
                                <p class="d-flex align-items-center"><?= $b["berat"]; ?> gram</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold d-flex justify-content-between align-items-center">
                                Jumlah
                                <p class="d-flex align-items-center"><?= $b["jumlah"]; ?></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold d-flex justify-content-between align-items-center">
                                Harga
                                <p class="d-flex align-items-center">Rp<?= $b["harga"]; ?></p>
                            </div>
                        </li>
                    </ul>
                    <div class="card-body d-flex justify-content-between align-items-end">
                        <a href="ubah.php?id=<?= $b["id"]; ?>" class="card-link">Ubah</a>
                        <a href="hapus.php?id=<?= $b["id"]; ?>" onclick="return confirm('yakin')" ; class="card-link">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- Akhir Kartu -->