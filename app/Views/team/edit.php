<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Upravit tým</h2>
<form method="post" action="<?= site_url('teams/update/' . $team['id']) ?>">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="team_name" class="form-label">Název týmu</label>
        <input type="text" class="form-control" name="team_name" id="team_name" required value="<?= set_value('team_name', $team['team_name']) ?>">
    </div>
    <button type="submit" class="btn btn-success">Uložit změny</button>
    <a href="<?= site_url('teams') ?>" class="btn btn-secondary">Zpět</a>
</form>
<?= $this->endSection() ?>