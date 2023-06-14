<?php $ruko = model('RukoModel')->findAll() ?>
<script>
    //lokasi ruko
    <?php if ($ruko) : ?>
        var markerData = [
            <?php foreach ($ruko as $Ruko) : ?> {
                    'name': 'Ruko <?= $Ruko['idRuko'] ?> - <?= $Ruko['pemilik'] ?>',
                    'latlng': [<?= $Ruko['lat'] . ', ' . $Ruko['lng'] ?>],
                    'id': '<?= $Ruko['idRuko'] ?>',
                },
            <?php endforeach ?>
        ]

        markerData.forEach(function(mark) {
            // Menambahkan marker
            var marker = L.marker(mark.latlng).addTo(<?= $id ?>)
            // Menambahkan popup ke marker
            marker.bindPopup(mark.name).openPopup()
        })
    <?php endif ?>
</script>