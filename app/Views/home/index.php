<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1 class="mb-4 text-center">Vítejte v administraci R6 projektu</h1>

<div class="row">
    <div class="col-md-6">
        <div class="card text-center mb-4">
            <div class="card-body">
                <h5 class="card-title">Správa hráčů</h5>
                <p class="card-text">Prohlížejte, přidávejte, upravujte a mažte hráče v databázi.</p>
                <a href="<?= site_url('players') ?>" class="btn btn-primary">Přejít na hráče</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-center mb-4">
            <div class="card-body">
                <h5 class="card-title">Správa týmů</h5>
                <p class="card-text">Prohlížejte, přidávejte, upravujte a mažte týmy v databázi.</p>
                <a href="<?= site_url('teams') ?>" class="btn btn-primary">Přejít na týmy</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>