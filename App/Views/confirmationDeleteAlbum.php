<div class="container">
    <div class="alert alert-warning" role="alert">
        Êtes-vous sur de vouloir supprimer l'album <strong><?= $name ?></strong> ?
    </div>
    <a href="deleteAlbum?id=<?= $id ?>" class="btn btn-primary">Oui</a>
    <a href="dashboard" class="btn btn-primary">Non</a>
</div>