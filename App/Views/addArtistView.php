<form method="POST" action="addArtistData">
    <!-- Name of the Artist -->
    <div class="form-group">
        <label class="fw-bold" for="artistName">Nom de l'artiste :</label>
        <textarea class="form-control" id="artistName" name="artistName" rows="1"></textarea>
    </div><br>
    <!-- Biography -->
    <div class="form-group">
        <label class="fw-bold" for="artistBio">Biographie :</label>
        <textarea class="form-control" id="artistBio" name="artistBio" rows="3"></textarea>
    </div><br>
    <!-- Button -->
    <button type="submit" class="btn btn-primary" >Valider</button>
</form>