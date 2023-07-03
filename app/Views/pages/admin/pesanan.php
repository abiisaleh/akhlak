<?php $this->extend('layout/admin'); ?>

<?php $this->section('content'); ?>
<?php $data['field'] = ['Ruko', 'Nama', 'Telp', 'Tanggal', 'Total', 'Pembayaran'] ?>
<?= view('component/tabelR', $data) ?>

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
                    <input type="text" id="inputidPesanan" name="idPesanan" hidden>
                    <div class="form-group row">
                        <label for="select2ruko" class="col-sm-4 col-form-label">Ruko</label>
                        <div class="col-sm-8">
                            <select name="fkruko" class="form-control" id="select2ruko"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputnama" placeholder="-" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtelp" class="col-sm-4 col-form-label">Telp</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="inputtelp" placeholder="-" name="telp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selectpembayaran" class="col-sm-4 col-form-label">Pembayaran</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="selectpembayaran" class="" name="pembayaran">
                                <option>Cash</option>
                                <option>Transfer Bank</option>
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

    <?php $this->endSection('content'); ?>


    <?php $this->section('script'); ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "admin/ruko/show",
                dataType: 'json',
                success: function(data) {
                    var options = data.data.map(function(obj) {
                        var angka = obj.harga;
                        var formatter = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        });
                        var format = formatter.format(angka);
                        return {
                            id: obj.idRuko,
                            text: '#' + obj.idRuko + ' ' + obj.pemilik + ' / ' + format
                        };
                    });

                    $("#select2ruko").select2({
                        theme: "bootstrap4",
                        data: options
                    });
                }
            });

        })

        $(function() {
            var dataTable = $('#tabel').DataTable({
                responsive: true,
                autoWidth: false,
                processing: true,
                ajax: window.location.href + '/show',
                columns: [{
                        "data": "idPesanan"
                    },
                    {
                        "data": "fkRuko"
                    },
                    {
                        "data": "nama"
                    },
                    {
                        "data": "telp"
                    },
                    {
                        "data": "tanggal"
                    },
                    {
                        "data": "total"
                    },
                    {
                        "data": "pembayaran"
                    },
                    <?php if (in_groups('admin')) : ?>

                        {
                            "data": ""
                        },
                    <?php endif ?>
                ],
                <?php if (in_groups('admin')) : ?>
                    columnDefs: [{
                        "targets": -1,
                        "data": null,
                        "defaultContent": "<button class='btn btn-sm btn-danger btnHapus'>Hapus</button> <button class='btn btn-sm btn-warning btnEdit'>Edit</button>"
                    }]
                <?php endif ?>
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
                var id = data.idPesanan

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

                $('#inputidPesanan').val(data.idPesanan);
                $("#select2ruko").val(data.fkRuko).trigger('change');
                $('#inputnama').val(data.nama);
                $('#inputtelp').val(data.telp);
                $('#inputpembayaran').val(data.pembayaran);

                $('#modal-add').modal('show');
            });
        })
    </script>

    <?php $this->endSection('script'); ?>