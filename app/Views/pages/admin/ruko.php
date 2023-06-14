<?php $this->extend('layout/admin'); ?>

<?php $this->section('content'); ?>

<?php $data['field'] = ['Alamat', 'Harga', 'Pemilik', 'Telp', 'Verifikasi', 'Status'] ?>
<?= view('component/tabel', $data) ?>

<!-- modal -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-add">
          <?= csrf_field(); ?>
          <input type="text" id="inputidRuko" name="idRuko" hidden>
          <div class="form-group row">
            <label for="inputalamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputalamat" placeholder="-" name="alamat">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-4 col-form-label">Harga</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="inputharga" placeholder="-" name="harga">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputpemilik" class="col-sm-4 col-form-label">Pemilik</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputpemilik" placeholder="-" name="pemilik">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputtelp" class="col-sm-4 col-form-label">telp</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="inputtelp" placeholder="-" name="telp">
            </div>
          </div>
          <div class="form-group row">
            <label for="selectverifikasi" class="col-sm-4 col-form-label">Verifikasi</label>
            <div class="col-sm-8">
              <select class="form-control" id="selectverifikasi" name="verifikasi">
                <option value="0">belum verifikasi</option>
                <option value="1">verifikasi</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="selectstatus" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
              <select class="form-control" id="selectstatus" name="status">
                <option value="0">dijual</option>
                <option value="1">terjual</option>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-save">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- modal-end -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-kriteria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-kriteria">
          <?= csrf_field(); ?>
          <input type="text" id="inputidRuko" name="idRuko" hidden>
          <?php $subkriteria = model('SubkriteriaModel') ?>
          <?php foreach ($kriteria as $value) : ?>
            <div class="form-group row">
              <input type="text" name="fkKriteria" value="<?= $value['idKriteria'] ?>" hidden>
              <label class="col-sm-4 col-form-label"><?= $value['kriteria'] ?></label>
              <div class="col-sm-8">
                <select class="form-control" name="fkKriteria">
                  <option>-</option>
                  <?php foreach ($subkriteria->kriteria($value['idKriteria']) as $Subkriteria) : ?>
                    <option value="<?= $Subkriteria['nilai'] ?>"><?= $Subkriteria['subkriteria'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-save">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!-- modal-end -->

<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
  $(function() {
    var dataTable = $('#tabel').DataTable({
      responsive: true,
      autoWidth: false,
      processing: true,
      ajax: window.location.href + '/show',
      columns: [{
          "data": "idRuko"
        },
        {
          "data": "alamat"
        },
        {
          "data": "harga"
        },
        {
          "data": "pemilik"
        },
        {
          "data": "telp"
        },
        {
          "data": "verifikasi"
        },
        {
          "data": "status"
        },
        {
          "data": ""
        },
      ],
      columnDefs: [{
        "targets": -1,
        "data": null,
        "defaultContent": `
          <button class='btn btn-sm btn-danger btnHapus'>Hapus</button> 
          <button class='btn btn-sm btn-warning btnEdit'>Detail</button> 
          <?php if (in_groups('admin')) : ?>
          <button class='btn btn-sm btn-success btnVerifikasi'>Verifikasi</button>
          <?php endif ?>
          `
      }, ]
    })

    //Tambah Data
    $('#form-add').submit(function(e) {
      e.preventDefault()
      $.ajax({
        url: window.location.href + '/save',
        type: 'POST',
        data: $(this).serialize(),
        success: function() {
          $('#modal-add').modal('hide')
          dataTable.ajax.reload()
          $('#form-add')[0].reset()

          $.ajax({
            url: "<?= base_url('admin/ruko/show') ?>",
            dataType: "json",
            success: function(data) {
              var mySpan = document.getElementById("countRuko");
              mySpan.textContent = data.total;
            }
          })
        }
      })
    })

    //Hapus Data
    $('#tabel tbody').on('click', '.btnHapus', function() {
      var data = dataTable.row($(this).parents('tr')).data()
      var id = data.idRuko

      if (confirm('Anda yakin ingin menghapus data ini?')) {
        $.ajax({
          url: window.location.href + '/delete',
          type: 'POST',
          data: {
            id: id
          },
          success: function() {
            dataTable.ajax.reload()
          }
        })
      }
    })

    // Edit Data
    $('#tabel tbody').on('click', '.btnEdit', function() {
      var data = dataTable.row($(this).parents('tr')).data();

      window.location.replace("<?= base_url('admin/ruko/edit/') ?>" + data.idRuko);
    });

    //Kriteria
    $('#tabel tbody').on('click', '.btnVerifikasi', function() {
      var data = dataTable.row($(this).parents('tr')).data();

      $('#inputidRuko').val(data.idRuko);
      $('#inputalamat').val(data.alamat);
      $('#inputharga').val(data.harga);
      $('#inputpemilik').val(data.pemilik);
      $('#inputtelp').val(data.telp);
      $('#selectverifikasi').val(data.verifikasi);
      $('#selectstatus').val(data.status);

      $('#modal-add').modal('show');
    });

  })
</script>
<?php $this->endSection('script'); ?>