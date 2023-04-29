<?php $this->extend('layout/admin');?>

<?php $this->section('content');?>

<?php $data['field'] = ['Kriteria','Bobot']?>
<?= view('component/tabel',$data)?>

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
            <input type="text" id="inputidKriteria" name="idKriteria" hidden>
            <div class="form-group row">
                <label for="inputkriteria" class="col-sm-4 col-form-label">Kriteria</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputkriteria" placeholder="-" name="kriteria">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputbobot" class="col-sm-4 col-form-label">Bobot</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputbobot" placeholder="-" name="bobot">
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

<?php $this->endSection('content');?>

<?php $this->section('script');?>
<script>
    $(function () {
    var dataTable = $('#tabel').DataTable({
      responsive: true,
      autoWidth: false,
      processing: true,
      ajax: window.location.href + '/show',
      columns: [
        {"data": "idKriteria"},
        {"data": "kriteria"},
        {"data": "bobot"},
        {"data": ""},
      ],
      columnDefs: [
        {
          "targets": -1,
          "data": null,
          "defaultContent": "<button class='btn btn-sm btn-danger btnHapus'>Hapus</button> <button class='btn btn-sm btn-warning btnEdit'>Edit</button>"
        },
      ]
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
        }
      })
    })

    //Hapus Data
    $('#tabel tbody').on('click', '.btnHapus', function() {
      var data = dataTable.row($(this).parents('tr')).data()
      var id = data.idKriteria
      
      if (confirm('Anda yakin ingin menghapus data ini?')) {
        $.ajax({
          url: window.location.href + '/delete',
          type: 'POST',
          data: { id: id },
          success: function() {
            dataTable.ajax.reload()
          }
        })
      }
    })

    // Edit Data
    $('#tabel tbody').on('click', '.btnEdit', function() {
        var data = dataTable.row($(this).parents('tr')).data();
        
        $('#inputidKriteria').val(data.idKriteria);
        $('#inputkriteria').val(data.kriteria);
        $('#inputbobot').val(data.bobot);

        $('#modal-add').modal('show');
    });
  })
</script>
<?php $this->endSection('script');?>