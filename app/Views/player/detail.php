<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Detail hráče</h2>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <?php if (!empty($player['image'])): ?>
    <div class="col-md-4">
      <img src="<?= base_url('writable/uploads/' . $player['image']) ?>" class="img-fluid rounded-start" alt="player image">
    </div>
    <?php endif; ?>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= esc($player['player_name']) ?></h5>
        <p class="card-text">
          Tým: <?= esc($player['team_name'] ?? '') ?><br>
          Národnost: <?= esc($player['nationality'] ?? '') ?><br>
          Role: <?= esc($player['role_name'] ?? '') ?><br>
          Věk: <?= esc($player['age']) ?><br>
          Headshot %: <?= esc($player['headshot_percentage']) ?><br>
          Zápasy: <?= esc($player['total_games']) ?><br>
          Deaths: <?= esc($player['total_deaths']) ?><br>
          K/D: <?= esc($player['kd_ratio']) ?>
        </p>
        <div>
          <strong>Popis:</strong>
          <div><?= $player['description'] ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="<?= site_url('players') ?>" class="btn btn-secondary">Zpět na seznam</a>
<?= $this->endSection() ?>