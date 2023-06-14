<?php
$fasilitas =
    model('FasilitasModel')
    ->join('kriteria', 'fkKriteria = idKriteria')
    ->join('subkriteria', 'fkSubkriteria = idSubkriteria')
    ->where('fkRuko', $ruko)
    ->select('kriteria, subkriteria')
    ->find();
?>
<div class="summary-list">
    <ul class="list">
        <?php foreach ($fasilitas as $Fasilitas) : ?>
            <li class="d-flex justify-content-between">
                <strong><?= ucfirst($Fasilitas['kriteria'])  ?></strong>
                <span><?= $Fasilitas['subkriteria'] ?></span>
            </li>
        <?php endforeach ?>
    </ul>
</div>