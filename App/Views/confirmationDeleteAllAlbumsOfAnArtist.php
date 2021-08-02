<div class="container">
    <div class="alert alert-warning" role="alert">
        Voulez-vous supprimer tous les albums de l'artiste <strong><?= $name ?></strong> ?
    </div>
    <a href="deleteAllAlbumsOfAnArtist?id=<?= $id ?>" class="btn btn-primary">Oui</a>
    <a href="dashboard" class="btn btn-primary">Non</a>
</div>