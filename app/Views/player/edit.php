<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Upravit hráče</h2>

<form method="post" enctype="multipart/form-data" action="<?= site_url('players/update/' . $player['id']) ?>">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="player_name" class="form-label">Jméno hráče</label>
        <input type="text" class="form-control" name="player_name" id="player_name" required value="<?= set_value('player_name', $player['player_name']) ?>">
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
            <option value="" disabled>-- Vyberte národnost --</option>
            <?php foreach ($nationalities as $n): ?>
                <option value="<?= $n['id'] ?>" <?= set_select('nationality_id', $n['id'], $player['nationality_id'] == $n['id']) ?>>
                    <?= esc($n['nationality']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select name="role_id" id="role_id" class="form-select" required>
            <option value="" disabled>-- Vyberte roli --</option>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>" <?= set_select('role_id', $role['id'], $player['role_id'] == $role['id']) ?>>
                    <?= esc($role['role_name']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Věk</label>
        <input type="number" class="form-control" name="age" id="age" value="<?= set_value('age', $player['age']) ?>">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Obrázek hráče</label>
        <?php if ($player['image']): ?>
            <img src="<?= base_url('writable/uploads/' . $player['image']) ?>" alt="player image" style="max-width:100px;">
        <?php endif; ?>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
        <small class="form-text text-muted">Pokud nechcete měnit obrázek, nevyplňujte.</small>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Popis</label>
        <textarea name="description" id="description" class="form-control" rows="6"><?= old('description', $player['description'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Uložit změny</button>
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