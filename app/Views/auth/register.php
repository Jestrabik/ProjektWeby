<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Registrace</h2>
<form method="post" action="<?= site_url('register') ?>">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="username" class="form-label">Uživatelské jméno</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Heslo</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <div class="mb-3">
        <label for="password_confirm" class="form-label">Potvrzení hesla</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
    </div>
    <button type="submit" class="btn btn-success">Registrovat se</button>
    <a href="<?= site_url('login') ?>" class="btn btn-link">Zpět na přihlášení</a>
</form>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger mt-3">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>