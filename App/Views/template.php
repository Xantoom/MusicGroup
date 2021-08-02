<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?> - MusicGroup</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Google Font core -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <header>
        <nav class="navbar-dark bg-dark align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow d-flex justify-content-between">
            <a href="<?= $logoRedirection ?>" class="navbar-brand"><strong>MusicGroup</strong></a>
            <div>
                <a href="<?= $navbarRedirection ?>" class="nav-item btn btn-outline-primary text-white"><?= $navbarButton ?></a>
                <?= $disconnectButton ?>
            </div>
        </nav>
    </header>

    <!-- Main -->
    <main class="flex-shrink-0">
        <div class="container">
            <?php if(isset($content)) : ?>
                <?= $content ?>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <p>MusicGroup - 2021</p>
        </div>
    </footer>
</body>
</html>