<?php $this->extend(('layout/user')); ?>

<?php $this->section('content'); ?>
<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Ruko tersedia</h1>
          <span class="color-text-a">Grid Properties</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Properties Grid
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- ======= Property Grid ======= -->
<section class="property-grid grid">
  <div class="container">
    <div class="row">
      <?php if (!is_null($ruko)) : ?>
        <div class="col-sm-12 mb-5">
          <div class="card text-left">
            <div class="card-body">
              <h4 class="card-title">Perhitungan</h4>
              <div class="row">
                <div class="col-md-6">
                  <p class="card-text">Tabel Kriteria</p>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kriteria (C)</th>
                        <th>Bobot Ternormalisasi (W)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                      foreach ($perhitungan['kriteria'] as $kriteria) : ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td><?= $kriteria['kriteria'] ?></td>
                          <td><?= $kriteria['bobot'] / 100 ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-12">
                      <p class="card-text">Tabel Alternatif</p>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>id Ruko</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                            <th>C7</th>
                            <th>C8</th>
                            <th>C9</th>
                            <th>C10</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($ruko as $alternatif) : ?>
                            <tr>
                              <td><?= $alternatif['idRuko'] ?></td>
                              <td><?= $alternatif['harga'] ?></td>
                              <td><?= $alternatif['ukuran'] ?></td>
                              <td><?= $alternatif['lokasi'] ?></td>
                              <td><?= $alternatif['fasilitas'] ?></td>
                              <td><?= $alternatif['kondisi jalan'] ?></td>
                              <td><?= $alternatif['lingkungan'] ?></td>
                              <td><?= $alternatif['listrik'] ?></td>
                              <td><?= $alternatif['lantai'] ?></td>
                              <td><?= $alternatif['halaman parkir'] ?></td>
                              <td><?= $alternatif['air'] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <p><i>data didapatkan dari hasil filter data ruko sesuai kriteria yang dipilih</i></p>
                    </div>

                    <div class="col-12">
                      <p class="card-text">Nilai Rating Kinerja Ternormalisasi</p>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>id Ruko</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                            <th>C7</th>
                            <th>C8</th>
                            <th>C9</th>
                            <th>C10</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($ruko as $alternatif) : ?>
                            <tr>
                              <td><?= $alternatif['idRuko'] ?></td>
                              <td><?= $alternatif['rating_harga'] ?></td>
                              <td><?= $alternatif['rating_ukuran'] ?></td>
                              <td><?= $alternatif['rating_lokasi'] ?></td>
                              <td><?= $alternatif['rating_fasilitas'] ?></td>
                              <td><?= $alternatif['rating_kondisi jalan'] ?></td>
                              <td><?= $alternatif['rating_lingkungan'] ?></td>
                              <td><?= $alternatif['rating_listrik'] ?></td>
                              <td><?= $alternatif['rating_lantai'] ?></td>
                              <td><?= $alternatif['rating_halaman parkir'] ?></td>
                              <td><?= $alternatif['rating_air'] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <p>
                        <i>
                          hasil perhitungan digunakan menggunakan rumus r<sub>ij</sub> = x<sub>ij</sub> / max x<sub>ij</sub> jika j adalah attribute keuntungan (benefit) dan r<sub>ij</sub> = min x<sub>ij</sub> / x<sub>ij</sub> jika j adalah attribute biaya (cost). kriteria yang termasuk attribut keuntungan yaitu <b>ukuran, lokasi, fasilitas, kondisi jalan, lingkungan, listrik, lantai, halaman parkir, air</b> sedangkan attribut biaya yaitu <b>harga</b>
                      </p>
                      </i>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <p class="card-text">Hasil</p>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id Ruko</th>
                        <th>C1xW1</th>
                        <th>C2xW2</th>
                        <th>C3xW3</th>
                        <th>C4xW4</th>
                        <th>C5xW5</th>
                        <th>C6xW6</th>
                        <th>C7xW7</th>
                        <th>C8xW8</th>
                        <th>C9xW9</th>
                        <th>C10xW10</th>
                        <th>Hasil Akhir</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ruko as $alternatif) : ?>
                        <tr>
                          <td><?= $alternatif['idRuko'] ?></td>
                          <td><?= $alternatif['V_harga'] ?></td>
                          <td><?= $alternatif['V_ukuran'] ?></td>
                          <td><?= $alternatif['V_lokasi'] ?></td>
                          <td><?= $alternatif['V_fasilitas'] ?></td>
                          <td><?= $alternatif['V_kondisi jalan'] ?></td>
                          <td><?= $alternatif['V_lingkungan'] ?></td>
                          <td><?= $alternatif['V_listrik'] ?></td>
                          <td><?= $alternatif['V_lantai'] ?></td>
                          <td><?= $alternatif['V_halaman parkir'] ?></td>
                          <td><?= $alternatif['V_air'] ?></td>
                          <td><?= $alternatif['V'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                    <i>
                      berdasarkan hasil perhitungan yang diperoleh maka ruko yang direkomendasikan yaitu <b>Ruko <?= $ruko[0]['idRuko'] ?></b> dengan hasil akhir <b><?= $ruko[0]['V'] ?></b>
                    </i>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (is_null($ruko)) : ?>
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading"></h4>
          <p>Ruko tidak ditemukan</p>
          <p class="mb-0"></p>
        </div>
      <?php else : ?>
        <?php foreach ($ruko as $item) : ?>
          <?= view_cell('CardRukoCell', ['idRuko' => $item['idRuko'], 'skor' => $item['V']]) ?>

        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <nav class="pagination-a">
          <ul class="pagination justify-content-end">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="bi bi-chevron-left"></span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item next">
              <a class="page-link" href="#">
                <span class="bi bi-chevron-right"></span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Property Grid Single-->
<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
  $(function() {
    $('.ruko').addClass('active')
  })
</script>
<?php $this->endSection('script'); ?>