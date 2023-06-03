<?php $ruko = model('RukoModel')->findAll() ?>
<script>
    //lokasi ruko
    <?php if ($ruko) : ?>
        <?php foreach ($ruko as $Ruko) : ?>
            // Menambahkan marker
            var marker<?= $Ruko['idRuko'] ?> = L.marker([<?= $Ruko['lat'] . ', ' . $Ruko['lng'] ?>]).addTo(<?= $id ?>);

            // Menambahkan popup ke marker
            marker<?= $Ruko['idRuko'] ?>.bindPopup('Ruko <?= $Ruko['idRuko'] ?> - <?= $Ruko['pemilik'] ?>.').openPopup();
        <?php endforeach ?>
    <?php endif ?>
</script>