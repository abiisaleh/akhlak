<?php $Ruko = model('RukoModel')->find($idRuko); ?>
<div class="card-box-a card-shadow">
    <?php if ($skor) : ?>
        <span class="badge bg-dark p-3 m-2 position-absolute top-10 start-0">skor: <?= $skor ?></span>
    <?php endif ?>
    <div class="img-box-a">
        <img src="uploads/img/<?= $Ruko['gambar'] ?>" alt="" class="img-a img-fluid" style="max-height: 400px; max-width: fit-content;">
    </div>
    <div class="card-overlay">
        <div class="card-overlay-a-content">
            <div class="card-header-a">
                <h2 class="card-title-a">
                    <a href="ruko/<?= $Ruko['idRuko'] ?>"><?= $Ruko['idRuko'] ?> <?= $Ruko['pemilik'] ?>
                        <br /> <?= $Ruko['alamat'] ?></a>
                </h2>
            </div>
            <div class="card-body-a">
                <div class="price-box d-flex">
                    <span class="price-a">sewa | Rp. <?= number_format($Ruko['harga']) ?></span>
                </div>
                <a href="ruko/<?= $Ruko['idRuko'] ?>" class="link-a">Detail selengkapnya
                    <span class="bi bi-chevron-right"></span>
                </a>
            </div>
            <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                    <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                            <sup>2</sup>
                        </span>
                    </li>
                    <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                    </li>
                    <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                    </li>
                    <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>