<?php $this->extend('layout/admin'); ?>

<?php $this->section('content'); ?>
<?php $data['field'] = ['Ruko', 'Nama', 'Telp', 'Tanggal', 'Total', 'Pembayaran'] ?>
<?= view('component/tabelR', $data) ?>
<?php $this->endSection('content'); ?>


<?php $this->section('script'); ?>
<script>
    $(function() {
        var dataTable = $('#tabel').DataTable({
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: ["print"],
            processing: true,
            ajax: '<?= base_url('admin/pesanan/show') ?>',
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
                }
            ],
        })
    })
</script>

<?php $this->endSection('script'); ?>