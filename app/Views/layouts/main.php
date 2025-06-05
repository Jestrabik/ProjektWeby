<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Projekt Weby') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">Projekt Weby</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('players') ?>">Hráči</a></li>
                    <!-- Přidej další odkazy dle potřeby -->
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Odhlásit se</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Přihlásit se</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if (session()->has('alert')): ?>
            <div class="alert alert-<?= esc(session('alert.type')) ?> alert-dismissible fade show" role="alert">
                <?= esc(session('alert.message')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zavřít"></button>
            </div>
        <?php endif; ?>
        <?= $this->renderSection('content') ?>
    </div>
    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>