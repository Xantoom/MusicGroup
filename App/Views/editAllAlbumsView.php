<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($albums as $album) : ?>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                <strong><?= $album->getName() ?></strong> - <?= $album->getArtist() ?></>
            </div>
            <ul class="list-group list-group-flush">
                <?php $songs = json_decode($album->getSongs(), JSON_UNESCAPED_UNICODE); ?>
                <?php foreach ($songs as $song) : ?>
                    <li class="list-group-item"><?= $song ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="editAlbum?id=<?= $album->getId() ?>" class="btn btn-primary">Editer</a>
        </div>
    <?php endforeach; ?>
</div>
