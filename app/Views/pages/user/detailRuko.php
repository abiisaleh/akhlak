<?php $this->extend('layout/user'); ?>

<?php $this->section('content'); ?>
<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single"><?= $ruko['idRuko'] . ' ' . $ruko['pemilik'] ?> </h1>
          <span class="color-text-a"><?= $ruko['alamat'] ?></span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- ======= Property Single ======= -->
<section class="property-single nav-arrow-b">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div id="property-single-carousel" class="swiper">
          <div class="swiper-wrapper">
            <div class="carousel-item-b swiper-slide">
              <img src="assets/img/slide-1.jpg" alt="">
            </div>
            <div class="carousel-item-b swiper-slide">
              <img src="assets/img/slide-2.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="property-single-carousel-pagination carousel-pagination"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        <div class="row justify-content-between">
          <div class="col-12 pt-3">
            <div class="property-price d-flex justify-content-left foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cash" style="font-size: 2rem">Rp</span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c"><?= number_format($ruko['harga']) ?></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="property-summary">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">Kriteria Ruko</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
                  <li class="d-flex justify-content-between">
                    <strong>Property ID:</strong>
                    <span>1134</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Location:</strong>
                    <span>Chicago, IL 606543</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Property Type:</strong>
                    <span>House</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Status:</strong>
                    <span>Sale</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Area:</strong>
                    <span>340m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Beds:</strong>
                    <span>4</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Baths:</strong>
                    <span>2</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Garage:</strong>
                    <span>1</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="col-sm-12">
              <div class="title-box-d section-t4">
                <h3 class="title-d">Pemilik Ruko</h3>
              </div>
            </div>
            <div class="property-agent">
              <p class="color-text-a">
                Hubungi pemilik untuk informasi lebih detail.
              </p>
              <ul class="list-unstyled">
                <li class="d-flex justify-content-between">
                  <strong>Nama:</strong>
                  <span class="color-text-a">Muhamad Abi Saleh</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Phone:</strong>
                  <span class="color-text-a">(222) 4568932</span>
                </li>
                <li class="d-flex justify-content-between">
                  <strong>Email:</strong>
                  <span class="color-text-a">annabella@example.com</span>
                </li>
              </ul>
              <p class="color-text-a">
                Untuk memesan silhkn mengisi form dibawah ini.
              </p>
            </div>
            <div class="property-contact">
              <form class="form-a">
                <div class="row">
                  <div class="col-md-12 mb-1">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Nama Lengkap *" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-1">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Telp *" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-1">
                    <div class="form-group">
                      <textarea id="textMessage" class="form-control" placeholder="Alamat *" name="message" cols="45" rows="5" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-a">Pesan Ruko</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Property Single-->
<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
  $(function() {
    $('.ruko').addClass('active')
  })
</script>
<?php $this->endSection('script'); ?>