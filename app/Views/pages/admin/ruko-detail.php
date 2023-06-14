<?php $this->extend('layout/admin'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Ruko</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="rukoForm" enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" name="idRuko" value="<?= $ruko['idRuko'] ?>">
                    <?php if ($ruko['gambar'] == '') : ?>
                        <div class="form-group">
                            <label for="inputgambar">Gambar Ruko</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="gambar" class="custom-file-input" id="inputgambar">
                                    <label class="custom-file-label" for="inputgambar">Choose file</label>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <img src="uploads/img/<?= $ruko['gambar'] ?>" alt="gamabar ruko" width="200">
                    <?php endif ?>
                    <div class="form-group">
                        <label for="inputalamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="inputalamat" value="<?= $ruko['alamat'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputpemilik">Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" id="inputpemilik" value="<?= $ruko['pemilik'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputharga">Harga</label>
                        <input type="text" pattern="[0-9]{6,}" title="masukkan harga" class="form-control" name="harga" id="inputharga" value="<?= $ruko['harga'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputtelp">No. telp</label>
                        <input type="text" pattern="[0-9]{11,}" title="masukkan nomor telp yang benar" class="form-control" name="telp" id="inputtelp" value="<?= $ruko['telp'] ?>">
                    </div>

                    <?php if ($ruko['dokumen'] == '') : ?>
                        <div class="form-group">
                            <label for="inputdokumen">Dokumen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="dokumen" class="custom-file-input" id="inputdokumen">
                                    <label class="custom-file-label" for="inputdokumen">Choose file</label>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="mb-2">
                            <a href="uploads/doc/<?= $ruko['dokumen'] ?>" class="btn btn-danger"><i class="fas fa-file-pdf"></i> File</a>
                        </div>
                    <?php endif ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Data Kriteria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="kriteriaForm">
                <div class="card-body">
                    <div class="row">
                        <input type="text" id="inputidRuko" name="idRuko" value="<?= $ruko['idRuko'] ?>" hidden>
                        <?php $subkriteria = model('SubkriteriaModel') ?>
                        <?php foreach ($kriteria as $value) : ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label"><?= $value['kriteria'] ?></label>

                                    <select class="form-control" name="<?= $value['idKriteria'] ?>" id="kriteria<?= $value['idKriteria'] ?>">
                                        <option value="0">-</option>
                                        <?php foreach ($subkriteria->kriteria($value['idKriteria']) as $Subkriteria) : ?>
                                            <option value="<?= $Subkriteria['idSubkriteria'] ?>"><?= $Subkriteria['subkriteria'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.card -->

<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script>
    // Submit form data via Ajax
    $("#rukoForm").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/ruko/save') ?>',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                toastr.success(response.msg)
            }
        });
    });

    // Submit form data via Ajax
    $("#kriteriaForm").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/ruko/fasilitas') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                toastr.success(response.msg)
            }
        });
    });

    <?php if (!empty($fasilitas)) : ?>
        <?php foreach ($fasilitas as $Fasilitas) : ?>
            $('#kriteria<?= $Fasilitas['fkKriteria'] ?>').val('<?= $Fasilitas['fkSubkriteria'] ?>')
        <?php endforeach; ?>
    <?php endif ?>
</script>
<?php $this->endSection(); ?>