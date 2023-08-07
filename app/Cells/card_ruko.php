<?php $Ruko = model('RukoModel')->find($idRuko); ?>
<?php if ($Ruko) : ?>
    <div class="col-md-4">
        <div class="card-box-a card-shadow">
            <?php if ($skor) : ?>
                <span class="badge bg-danger p-3 m-2 position-absolute top-10 start-0" style="z-index: 1;">skor: <?= $skor ?></span>
            <?php endif ?>

            <div class="img-box-a">
                <img src="uploads/img/<?= $Ruko['gambar'] ?>" alt="" class="img-a img-fluid" style="max-height: 400px; max-width: fit-content; <?= ($Ruko['status'] == 1) ? 'filter: grayscale(100%)' : '' ?>">
            </div>

            <div class="card-overlay">
                <div class="card-overlay-a-content">
                    <div class="card-header-a">
                        <?php if ($Ruko['status'] == 1) : ?>
                            <span class="badge bg-success p-3">Terjual</span>
                        <?php endif ?>
                        <h2 class="card-title-a">
                            <a href="<?= ($Ruko['status'] == 1) ? 'javascript:void(0)' : 'ruko/' . $Ruko['idRuko'] ?>"><?= $Ruko['idRuko'] ?> <?= $Ruko['pemilik'] ?>
                                <br /> <?= $Ruko['alamat'] ?></a>
                        </h2>
                    </div>
                    <div class="card-body-a">
                        <div class="price-box d-flex">
                            <span class="price-a">sewa | Rp. <?= number_format($Ruko['harga']) ?></span>
                        </div>
                        <a href="<?= ($Ruko['status'] == 1) ? 'javascript:void(0)' : 'ruko/' . $Ruko['idRuko'] ?>" class="link-a">Detail selengkapnya
                            <span class="bi bi-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>