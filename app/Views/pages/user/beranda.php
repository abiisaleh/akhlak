<?php $this->extend('layout/user'); ?>

<?php $this->section('intro'); ?>
<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative" id="home">

  <div class="swiper-wrapper">

    <?php foreach ($ruko as $item) : ?>

      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(uploads/img/<?= $item['gambar'] ?>)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?= $item['alamat'] ?>, Jayapura
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b"><?= $item['idRuko'] ?> </span> <?= $item['pemilik'] ?>
                      <br> <?= $item['alamat'] ?>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">sewa | Rp. <?= number_format($item['harga']) ?></span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
  <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->
<?php $this->endSection('intro'); ?>

<?php $this->section('content'); ?>

<!-- ======= Services Section ======= -->
<section class="section-services section-t8" id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Layanan Kami</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="bi bi-search"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Cari</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Cari ruko sesuai kriteria yang diingkinkan. kami akan merekomendasikan menggunakan algoritma SAW (Simple Additive Weight).
            </p>
          </div>
          <div class="card-footer-c">
            <a href="#" class="link-c link-icon">Read more
              <span class="bi bi-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="bi bi-calendar4-week"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Pesan</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
              aliquet elit, eget tincidunt
              nibh pulvinar a.
            </p>
          </div>
          <div class="card-footer-c">
            <a href="#" class="link-c link-icon">Read more
              <span class="bi bi-calendar4-week"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <span class="bi bi-card-checklist"></span>
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Jual</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
              convallis a pellentesque
              nec, egestas non nisi.
            </p>
          </div>
          <div class="card-footer-c">
            <a href="#" class="link-c link-icon">Read more
              <span class="bi bi-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Services Section -->

<!-- ======= Latest Properties Section ======= -->
<section class="section-property section-t8" id="ruko">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Ruko Terbaru</h2>
          </div>
          <div class="title-link">
            <a href="ruko">Semua Ruko
              <span class="bi bi-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div id="property-carousel" class="swiper">
      <div class="swiper-wrapper">

        <?php foreach ($ruko as $item) : ?>

          <div class="carousel-item-b swiper-slide">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="uploads/img/<?= $item['gambar'] ?>" alt="" class="img-a img-fluid" style="max-height: 400px; max-width: fit-content;">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single.html"><?= $item['idRuko'] ?> <?= $item['pemilik'] ?>
                        <br /> <?= $item['alamat'] ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">sewa | Rp. <?= number_format($item['harga']) ?></span>
                    </div>
                    <a href="ruko/<?= $item['idRuko'] ?>" class="link-a">Detail selengkapnya
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

        <?php endforeach; ?>

      </div>
    </div>
    <div class="propery-carousel-pagination carousel-pagination"></div>

  </div>
</section><!-- End Latest Properties Section -->

<!-- ======= Contact Single ======= -->
<section class="contact section-t8" id="daftar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Daftarkan Ruko Anda</h2>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-7">
            <form action="/daftar" method="post" role="form" class="">
              <div class="row">
                <!-- data ruko -->
                <input type="text" name="lat" id="inputMapJuallat" hidden required>
                <input type="text" name="lng" id="inputMapJuallng" hidden required>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="text" name="pemilik" class="form-control form-control-lg form-control-a" placeholder="Nama Pemilik" required>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="text" name="telp" class="form-control form-control-lg form-control-a" placeholder="Telp" required>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <input type="number" name="harga" class="form-control form-control-lg form-control-a" placeholder="Harga" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea name="alamat" class="form-control" cols="35" rows="6" placeholder="Alamat" required></textarea>
                  </div>
                </div>

                <div class="col-md-12 text-center mt-2">
                  <button type="submit" class="btn btn-a">Daftarkan Ruko</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 section-md-t3">
            <div id="mapJual" class="map"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Contact Single-->
<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
  $(function() {
    $('.home').addClass('active')
  })
</script>
<?php $this->endSection('script'); ?>