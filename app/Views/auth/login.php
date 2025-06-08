<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Přihlášení</h2>
<form method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="username" class="form-label">Uživatelské jméno</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Heslo</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Přihlásit se</button>
    <a href="<?= site_url('register') ?>" class="btn btn-link">Zaregistrovat se</a>
</form>

<?php if (isset($error)): ?>
    <div class="alert alert-danger mt-3"><?= esc($error) ?></div>
<?php endif; ?>

<?= $this->endSection() ?>