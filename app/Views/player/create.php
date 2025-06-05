<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Přidat hráče</h2>

<form method="post" enctype="multipart/form-data" action="<?= site_url('players/store') ?>">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="player_name" class="form-label">Jméno hráče</label>
        <input type="text" class="form-control" name="player_name" id="player_name" required value="<?= old('player_name') ?>">
    </div>

    <div class="mb-3">
        <label for="team_id" class="form-label">Tým</label>
        <select name="team_id" id="team_id" class="form-select" required>
            <option value="" disabled selected hidden>-- Vyberte tým --</option>
            <?php foreach ($teams as $team): ?>
                <option value="<?= esc($team['id']) ?>" <?= (old('team_id', $player['team_id'] ?? '') == $team['id']) ? 'selected' : '' ?>>
                    <?= esc($team['team_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="nationality_id" class="form-label">Národnost</label>
        <select name="nationality_id" id="nationality_id" class="form-select" required>
            <option value="" disabled selected>-- Vyberte národnost --</option>
            <?php foreach ($nationalities as $n): ?>
                <option value="<?= $n['id'] ?>" <?= old('nationality_id') == $n['id'] ? 'selected' : '' ?>>
                    <?= esc($n['nationality']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select name="role_id" id="role_id" class="form-select" required>
            <option value="" disabled selected>-- Vyberte roli --</option>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>" <?= old('role_id') == $role['id'] ? 'selected' : '' ?>>
                    <?= esc($role['role_name']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Věk</label>
        <input type="number" class="form-control" name="age" id="age" value="<?= old('age') ?>">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Obrázek hráče</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Popis</label>
        <textarea name="description" id="description" class="form-control" rows="6"><?= old('description', $player['description'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Uložit</button>
    <a href="<?= site_url('players') ?>" class="btn btn-secondary">Zpět</a>
</form>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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