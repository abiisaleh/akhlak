<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SewaRuko</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <base href="<?= base_url() ?>">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- leaflet Maps -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

  <style>
    .map {
      height: 280px;
      width: 100%;
    }
  </style>
  <!-- =======================================================
  * Template Name: EstateAgency
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Temukan Ruko</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <div class="row">
        <p>Cari Ruko dalam radius 1 km</p>
        <div id="mapSewa" class="map"></div>

        <div class="col-md-12 mt-5">
          <button type="button" id="btn-search" class="btn btn-b">Temukan Ruko</button>
        </div>
      </div>
      <div id="hasil"></div>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Sewa<span class="color-b">Ruko</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link home" href="#home">Beranda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#about">Tentang</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ruko" href="#ruko">Ruko</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="#daftar">Daftar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="admin">Masuk</a>
          </li>
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->

  <?php $this->renderSection('intro'); ?>

  <main id="main">

    <?php $this->renderSection('content'); ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">SewaRuko</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Temukan Ruko impian Anda dengan mudah menggunakan sistem rekomendasi kami! Hemat waktu dan usaha dalam proses pemesanan.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Menu</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#daftar">Daftarkan Ruko</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#ruko">Sewa Ruko</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Kecamatan</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Koya Barat</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Koya Timur</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">SewaRuko</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Made by <a href="https://github.com/abiisaleh">abiisaleh</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>

  <script>
    //Nav Link
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach((link) => {
      link.addEventListener('click', () => {
        navLinks.forEach((navLinks) => {
          navLinks.classList.remove('active')
        })
        link.classList.add('active')
      })
    })

    //Maps Leaflet
    var mapSewa = L.map('mapSewa').setView([-2.672313, 140.827509], 13); // Set initial map center and zoom level
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18
    }).addTo(mapSewa);

    var marker = null; // Global marker variable
    var radius;

    function onMapClickSewa(e) {
      // Hapus marker dan radius sebelumnya (jika ada)
      if (marker) {
        mapSewa.removeLayer(marker);
      }
      if (radius) {
        mapSewa.removeLayer(radius);
      }

      // Tambahkan radius pada marker
      radius = L.circle(e.latlng, {
        color: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.3,
        radius: 3000 // Radius dalam meter
      }).addTo(mapSewa);
    }

    mapSewa.on('click', onMapClickSewa);

    $('#btn-search').on('click', function() {
      // Array untuk menyimpan marker dalam radius
      var markersInRadius = [];

      // Loop melalui data marker
      markerData.forEach(function(marker) {
        var markerLatLng = L.latLng(marker.latlng);

        // Memeriksa apakah marker berada dalam batas-batas lingkaran
        if (radius.getBounds().contains(markerLatLng)) {
          markersInRadius.push(marker.id);
        }
      });

      // Mengirim markersInRadius menggunakan Ajax (jQuery)
      $.ajax({
        url: 'search',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(markersInRadius),
        success: function(response) {
          // Handle response dari server jika diperlukan
          // $('#hasil').empty()
          // $('#hasil').append(response)
          window.location.href = '<?= base_url('rekomendasi') ?>'
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle error jika terjadi kesalahan
          console.error('Terjadi kesalahan:', errorThrown);
        }
      });
    })

    var mapJual = L.map('mapJual').setView([-2.672313, 140.827509], 13); // Set initial map center and zoom level
    // Tambahkan Google Maps sebagai latar belakang
    L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
      maxZoom: 18,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(mapJual);


    function onMapClickJual(e) {
      if (marker) {
        marker.setLatLng(e.latlng); // Update marker position
        $('#inputMapJuallat').val(e.latlng.lat);
        $('#inputMapJuallng').val(e.latlng.lng);
      } else {
        marker = L.marker(e.latlng).addTo(mapJual); // Create marker if it doesn't exist
        $('#inputMapJuallat').val(e.latlng.lat);
        $('#inputMapJuallng').val(e.latlng.lng);
      }
    }

    mapJual.on('click', onMapClickJual);
  </script>

  <?= view_cell('MapRukoCell', 'id=mapSewa') ?>

  <?php $this->renderSection('script'); ?>

</body>

</html>