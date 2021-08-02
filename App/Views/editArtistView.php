<form method="POST" action="editArtistData?id=<?= $artist->getId() ?>">
    <!-- Button -->
    <input type="submit" class="btn btn-primary" value="Valider les modifications"><br><br>
    <!-- Name of the Artist -->
    <div class="form-group">
        <label class="fw-bold" for="artistName">Nom de l'artiste :</label>
        <textarea class="form-control" id="artistName" name="artistName" rows="1"><?= $artist->getName() ?></textarea>
    </div><br>
    <!-- Biography -->
    <div class="form-group">
        <label class="fw-bold" for="artistBio">Biographie :</label>
        <textarea class="form-control" id="artistBio" name="artistBio" rows="3"><?= $artist->getBio() ?></textarea>
    </div><br>
    <!-- Albums -->
    <?php if(!empty($this->getAllAlbumsByArtist($artist))) : ?>
    <div class="form-group">
        <a class="btn btn-primary" href="editAllAlbums?id=<?= $artist->getId() ?>">Editer les albums de cet artiste</a>
    </div><br>
    <?php endif; ?>
</form>