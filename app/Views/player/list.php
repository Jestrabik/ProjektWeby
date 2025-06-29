<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Domů</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hráči</li>
  </ol>
</nav>

<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('players/create') ?>" class="btn btn-success">+ Přidat hráče</a>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($players as $player): ?>
    <div class="col">
        <div class="card h-100">
            <div class="card-body text-center">
                <!-- Obrázek hráče -->
                <img src="<?= base_url('images/' . ($player['image'] ?? 'blank-pfp.jpg')) ?>"
                     alt="Profil hráče"
                     class="img-fluid rounded-circle mb-2"
                     style="width: 100px; height: 100px; object-fit: cover;">
                <h5 class="card-title"><?= esc($player['player_name']) ?></h5>
                <p class="card-text">
                    <?php if (isset($player['team_name'])): ?>
                        <?= esc($player['team_name']) ?>
                    <?php else: ?>
                        Tým neznámý
                    <?php endif; ?>
                </p>
                <a href="<?= site_url('players/detail/' . $player['id'] . '/' . urlencode($player['player_name'])) ?>" class="btn btn-primary">Detail</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $player['id'] ?>">
                    Smazat
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="mt-4 d-flex justify-content-center">
    <?= $pager->links('default', 'bootstrap5') ?>
</div>

<?php foreach ($players as $player): ?>
<div class="modal fade" id="deleteModal<?= $player['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $player['id'] ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel<?= $player['id'] ?>">Potvrzení smazání</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zavřít"></button>
      </div>
      <div class="modal-body">
        Opravdu chcete smazat hráče <strong><?= esc($player['player_name']) ?></strong>?
      </div>
      <div class="modal-footer">
        <form method="post" action="<?= site_url('players/delete/' . $player['id']) ?>">
            <?= csrf_field() ?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušit</button>
            <button type="submit" class="btn btn-danger">Smazat</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?= $this->endSection() ?>