<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Domů</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hráči</li>
  </ol>
</nav>

<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($players as $player): ?>
    <div class="col">
        <div class="card h-100">
            <?php if (!empty($player['image'])): ?>
                <img src="<?= base_url('uploads/' . $player['image']) ?>" class="card-img-top" alt="<?= esc($player['name']) ?>">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= esc($player['name']) ?></h5>
                <p class="card-text"><?= esc($player['description']) ?></p>
                <a href="<?= site_url('players/detail/' . $player['id'] . '/' . urlencode($player['name'])) ?>" class="btn btn-primary">Detail</a>
                <!-- V kartě hráče -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $player['id'] ?>">
                    Smazat
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="mt-4">
    <?= $pager->links() ?>
</div>

<?php foreach ($players as $player): ?>
<!-- Modal pro každého hráče -->
<div class="modal fade" id="deleteModal<?= $player['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $player['id'] ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel<?= $player['id'] ?>">Potvrzení smazání</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zavřít"></button>
      </div>
      <div class="modal-body">
        Opravdu chcete smazat hráče <strong><?= esc($player['name']) ?></strong>?
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