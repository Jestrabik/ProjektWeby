<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Seznam zápasů</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Mapa</th>
            <th>Datum</th>
            <th>Délka (h)</th>
            <th>Vítězný tým</th>
            <th>Výsledek</th>
            <th>MVP</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= esc($match['map']) ?></td>
                <td><?= esc($match['match_date']) ?></td>
                <td><?= esc($match['match_duration']) ?></td>
                <td><?= esc($match['winning_team']) ?></td>
                <td><?= esc($match['final_result']) ?></td>
                <td><?= esc($match['mvp']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>