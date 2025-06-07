<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="text-center">Detail hráče</h2>
<div class="d-flex justify-content-center">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <?php if (!empty($player['image'])): ?>
      <div class="col-md-4 d-flex align-items-center">
        <img src="<?= base_url('writable/uploads/' . $player['image']) ?>" class="img-fluid rounded-start mx-auto d-block" alt="player image">
      </div>
      <?php endif; ?>
      <div class="col-md-8">
        <div class="card-body text-center">
          <h5 class="card-title"><?= esc($player['player_name']) ?></h5>
          <p class="card-text text-center">
            <strong>Tým:</strong> <?= esc($player['team_name'] ?? '') ?><br>
            <strong>Národnost:</strong> <?= esc($player['nationality'] ?? '') ?><br>
            <strong>Role:</strong> <?= esc($player['role'] ?? '') ?><br>
            <strong>Věk:</strong> <?= esc($player['age']) ?><br>
            <strong>Headshot %:</strong> <?= esc($player['headshot_percentage']) ?><br>
            <strong>Zápasy celkem:</strong> <?= esc($player['total_games']) ?><br>
            <strong>Deaths:</strong> <?= esc($player['total_deaths']) ?><br>
            <strong>K/D:</strong> <?= esc($player['kd_ratio']) ?><br>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="text-center">
  <a href="<?= site_url('players') ?>" class="btn btn-secondary">Zpět na seznam</a>
</div>
<?= $this->endSection() ?>