<?php $this->extend('layout/admin');?>

<?php $this->section('content');?>
<?php $data['field'] = ['Kriteria','Subkriteria','Nilai']?>
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
            <input type="text" id="inputidSubkriteria" name="idSubkriteria" hidden>
            <div class="form-group row">
                <label for="select2kriteria" class="col-sm-4 col-form-label">Kriteria</label>
                <div class="col-sm-8">
                    <select name="fkKriteria" class="form-control" id="select2kriteria"></select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputsubkriteria" class="col-sm-4 col-form-label">Subkriteria</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputsubkriteria" placeholder="-" name="subkriteria">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputnilai" class="col-sm-4 col-form-label">Nilai</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputnilai" placeholder="-" name="nilai">
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
    $(document).ready(function () {
        $.ajax({
            url: "admin/data-master/kriteria/show",
            dataType: 'json',
            success: function(data) {
                var options = data.data.map(function(obj) {
                    return { id: obj.idKriteria, text: obj.kriteria };
                });

                $("#select2kriteria").select2({
                    theme: "bootstrap4",
                    data: options
                });
            }
        });
    })

    $(function () {
        var dataTable = $('#tabel').DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            ajax: window.location.href + '/show',
            columns: [
                {"data": "idSubkriteria"},
                {"data": "kriteria"},
                {"data": "subkriteria"},
                {"data": "nilai"},
                {"data": ""},
            ],
            columnDefs: [
                {
                "targets": -1,
                "data": null,
                "defaultContent": "<button class='btn btn-sm btn-danger btnHapus'>Hapus</button> <button class='btn btn-sm btn-warning btnEdit'>Edit</button>"
                },
            ],
            initComplete: function() {
                var select = $('<select><option value="">Semua</option></select>')
                .appendTo( $('#tabel_filter').empty().text('Kriteria: ') )
                .on('change', function() {
                    dataTable.column(1).search( $(this).val() ).draw();
                });

                dataTable.column(1).data().unique().sort().each(function(d, j) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                });
            },
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
        var id = data.idSubkriteria
        
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

            $('#inputidSubkriteria').val(data.idSubkriteria);
            $("#select2kriteria").val(data.fkKriteria).trigger('change');
            $('#inputsubkriteria').val(data.subkriteria);
            $('#inputnilai').val(data.nilai);

            $('#modal-add').modal('show');
        });
  })
</script>

<?php $this->endSection('script');?>