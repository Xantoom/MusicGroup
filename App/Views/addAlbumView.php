<form method="POST" action="addAlbumData">
    <!-- Button -->
    <input type="submit" class="btn btn-primary" value="Valider"><br><br>
    <!-- Name of the Album -->
    <div class="form-group">
        <label class="fw-bold" for="albumName">Nom de l'album :</label>
        <textarea class="form-control" id="albumName" name="albumName" rows="1"></textarea>
    </div><br>
    <!-- Artist -->
    <div class="form-group">
        <label class="fw-bold" for="albumArtist">Nom de l'artiste :</label>
        <textarea class="form-control" id="albumArtist" name="albumArtist" rows="1"></textarea>
    </div><br>
    <!-- Songs -->
    <div class="form-group">
        <label class="fw-bold" for="albumSongs">Chansons de l'album : (Mettre tous les albums séparés par des virgules, sans espaces, ex: chanson1,chanson2)</label>
        <textarea class="form-control" id="albumSongs" name="albumSongs" rows="3"></textarea>
    </div><br>
</form>