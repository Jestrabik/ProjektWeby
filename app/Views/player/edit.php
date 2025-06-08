<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Upravit hráče</h2>

<form method="post" enctype="multipart/form-data" action="<?= site_url('players/update/' . $player['id']) ?>">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="player_name" class="form-label">Jméno hráče</label>
        <input type="text" class="form-control" name="player_name" id="player_name" required value="<?= esc($player['player_name']) ?>">
    </div>

    <div class="mb-3">
        <label for="team_id" class="form-label">Tým</label>
        <select name="team_id" id="team_id" class="form-select" required>
            <option value="" disabled selected hidden>-- Vyberte tým --</option>
            <?php foreach ($teams as $team): ?>
                <option value="<?= esc($team['team_id']) ?>" <?= (old('team_id', $player['team_id'] ?? '') == $team['team_id']) ? 'selected' : '' ?>>
                    <?= esc($team['team_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="nationality" class="form-label">Národnost</label>
        <input type="text" class="form-control" name="nationality" id="nationality" required value="<?= esc($player['nationality']) ?>">
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input type="text" class="form-control" name="role" id="role" required value="<?= esc($player['role']) ?>">
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Věk</label>
        <input type="number" class="form-control" name="age" id="age" value="<?= esc($player['age']) ?>">
    </div>

    <div class="mb-3">
        <label for="headshot_percentage" class="form-label">Headshot %</label>
        <input type="number" step="0.01" class="form-control" name="headshot_percentage" id="headshot_percentage" value="<?= esc($player['headshot_percentage']) ?>">
    </div>

    <div class="mb-3">
        <label for="total_games" class="form-label">Zápasy celkem</label>
        <input type="number" class="form-control" name="total_games" id="total_games" value="<?= esc($player['total_games']) ?>">
    </div>

    <div class="mb-3">
        <label for="total_deaths" class="form-label">Deaths</label>
        <input type="number" class="form-control" name="total_deaths" id="total_deaths" value="<?= esc($player['total_deaths']) ?>">
    </div>

    <div class="mb-3">
        <label for="kd_ratio" class="form-label">K/D</label>
        <input type="number" step="0.01" class="form-control" name="kd_ratio" id="kd_ratio" value="<?= esc($player['kd_ratio']) ?>">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Obrázek hráče</label>
        <?php if (!empty($player['image'])): ?>
            <img src="<?= base_url('images/' . $player['image']) ?>" alt="player image" style="max-width:100px;">
        <?php endif; ?>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
        <small class="form-text text-muted">Pokud nechcete měnit obrázek, nevyplňujte.</small>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Popis</label>
        <textarea name="description" id="description" class="form-control" rows="6"><?= old('description', $player['description'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Uložit změny</button>
    <a href="<?= site_url('players/detail/' . $player['id']) ?>" class="btn btn-secondary">Zpět na detail</a>
</form>

<script src="https://cdn.tiny.cloud/1/c9lecrcrlps92cnr4k5dmb54bhn6a9xkmq5ovcc6w3aczrif/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        menubar: false,
        plugins: 'lists link',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link',
        language: 'cs'
    });
</script>

<?= $this->endSection() ?>