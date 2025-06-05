<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Domů</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hráči</li>
  </ol>
</nav>

<table class="table">
    <thead>
        <tr>
            <th>Název týmu</th>
            <th>Trenér</th>
            <th>Národnost</th>
            <th>Počet hráčů</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team): ?>
        <tr>
            <td><?= esc($team['team_name']) ?></td>
            <td><?= esc($team['coach']) ?></td>
            <td><?= esc($team['nationality']) ?></td>
            <td><?= esc($team['player_count']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>