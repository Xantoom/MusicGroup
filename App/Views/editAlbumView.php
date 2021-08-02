<form method="POST" action="editAlbumData?id=<?= $album->getId() ?>">
    <!-- Button -->
    <input type="submit" class="btn btn-primary" value="Valider les modifications"><br><br>
    <!-- Name of the Album -->
    <div class="form-group">
        <label class="fw-bold" for="albumName">Nom de l'album :</label>
        <textarea class="form-control" id="albumName" name="albumName" rows="1"><?= $album->getName() ?></textarea>
    </div><br>
    <!-- Artist Name -->
    <div class="form-group">
        <label class="fw-bold" for="albumArtist">Artiste :</label>
        <textarea class="form-control" id="albumArtist" name="albumArtist" rows="3"><?= $album->getArtist() ?></textarea>
    </div><br>
    <!-- Songs -->
    <div class="form-group">
        <label class="fw-bold" for="albumSongs">Chansons : (séparé par des virgules, sans espaces, ex: chanson1,chanson2)</label>
        <textarea class="form-control" id="albumSongs" name="albumSongs" rows="3"><?= $songs ?></textarea>
    </div><br>
</form>