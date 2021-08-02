<a class="btn btn-primary" href="addArtist">Ajouter un artiste</a>
<a class="btn btn-primary" href="addAlbum">Ajouter un album</a>
<br><br><br>

<?php if(empty($arrayOfAllArtists)) : ?>
    <div class="alert alert-warning" role="alert">
        <strong>Aucune donnée.</strong>
    </div>
<?php else : ?>
    <?php if(isset($numberOfPages)) : ?>
        <?php if(!($numberOfPages <= 1)) : ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <!-- Previous Button -->
                    <li class="page-item <?= $disabledPrevious ?>">
                        <a class="page-link" href="<?= $previousPageLink ?>">Précèdent</a>
                    </li>
                    <!-- First Page Button -->
                    <?php if($currentPage >= 3) : ?>
                        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                    <?php endif; ?>
                    <!-- ... Button -->
                    <?php if($currentPage >= 4) : ?>
                        <li class="page-item"><a class="page-link disabled">...</a></li>
                    <?php endif; ?>
                    <!-- Previous Button -->
                    <?php if(!($currentPage == 1)) : ?>
                        <li class="page-item"><a class="page-link" href="<?= $previousPageLink ?>"><?= $previousPage ?></a></li>
                    <?php endif; ?>
                    <!-- Current Page Button -->
                    <li class="page-item"><a class="page-link" href=""><strong><?= $currentPage ?></strong></a></li>
                    <!-- Next Button -->
                    <?php if(!($currentPage == $numberOfPages)) : ?>
                        <li class="page-item"><a class="page-link" href="<?= $nextPageLink ?>"><?= $nextPage ?></a></li>
                    <?php endif; ?>
                    <!-- ... Button -->
                    <?php if($currentPage <= ($numberOfPages - 3)) : ?>
                        <li class="page-item"><a class="page-link disabled">...</a></li>
                    <?php endif; ?>
                    <!-- Last Page Button -->
                    <?php if($currentPage <= ($numberOfPages - 2)) : ?>
                        <li class="page-item"><a class="page-link" href="page=<?= $numberOfPages ?>"><?= $numberOfPages ?></a></li>
                    <?php endif; ?>
                    <!-- Next Button -->
                    <li class="page-item <?= $disabledNext ?>">
                        <a class="page-link" href="<?= $nextPageLink ?>">Suivant</a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    <?php endif; ?>

    <table id="editableTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom d'Artiste</th>
                <th>Albums</th>
                <th>Edition</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($arrayOfArtists)) : ?>
            <?php foreach($arrayOfArtists[$currentPage - 1] as $k => $artist) : ?>
                <tr>
                    <td><strong><?= $artist->getId() ?></strong></td>
                    <td><?= $artist->getName() ?></td>
                    <?php if(!empty($this->getAllAlbumsByArtist($artist))) : ?>
                        <td><?= count($this->getAllAlbumsByArtist($artist)) ?></td>
                    <?php else: ?>
                        <td>0</td>
                    <?php endif; ?>
                    <td>
                        <a class="material-icons text-decoration-none" href="editArtist?id=<?= $artist->getId() ?>">build</a>
                        <a class="material-icons text-decoration-none" href="confirmationDeleteArtist?id=<?= $artist->getId(); ?>">delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
