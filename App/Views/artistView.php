<div class="container">
    <div class="d-flex justify-content-between">
        <h2 class="header-section"><strong><?= $currentArtist->getName() ?></strong></h2><br>
        <?php if(\Core\Login::isLogged()) : ?>
            <a class="btn btn-primary fw-bold" href="editArtist?id=<?= $currentArtist->getId() ?>" role="button">Editer l'artiste</a>
        <?php endif; ?>
    </div>
    <h5 class="header-section disabled"><?= $currentArtist->getFormattedDate() ?></h5><br>
    <p><?= $currentArtist->getBio() ?></p><br>
    <?php if(!empty($albums)): ?>
        <h6 class="header-section disabled">Les albums (du plus récent au plus ancien) :</h6><br>
        <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach($albums as $album): ?>
            <div class="card mx-2" style="width: 18rem;">
                <div class="card-header fw-bold">
                    <?= $album->getName() ?>
                </div>
                <?php $songs = json_decode($album->getSongs(), JSON_UNESCAPED_UNICODE); ?>
                <?php foreach($songs as $song): ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $song ?></li>
                    </ul>
                <?php endforeach; ?>
            </div><br>
        <?php endforeach; ?>
        </div>
    <?php else: ?>Aucun album disponible pour cet artiste.
    <?php endif; ?>
</div>