<div class="container">
    <div class="alert alert-warning" role="alert">
        Êtes-vous sur de vouloir supprimer l'artiste <strong><?= $name ?></strong> ?
    </div>
    <a href="deleteArtist?id=<?= $id ?>" class="btn btn-primary">Oui</a>
    <a href="dashboard" class="btn btn-primary">Non</a>
</div>