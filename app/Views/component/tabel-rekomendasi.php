<table class="table">
    <thead>
        <td>ID Ruko</td>
        <td>Nilai</td>
    </thead>
    <tbody>
        <?php foreach ($data as $Data) : ?>
            <tr>
                <td><?= $Data['rukoID'] ?></td>
                <td><?= $Data['V'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>