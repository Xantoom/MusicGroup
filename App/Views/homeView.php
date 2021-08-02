<div class="container">
    <!-- Title -->
    <br><h3><strong>Du plus récent au plus ancien :</strong></h3>

    <!-- Pagination System -->
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
                <li class="page-item"><a class="page-link" href="?page=<?= $numberOfPages ?>"><?= $numberOfPages ?></a></li>
            <?php endif; ?>
            <!-- Next Button -->
            <li class="page-item <?= $disabledNext ?>">
                <a class="page-link" href="<?= $nextPageLink ?>">Suivant</a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($arrayOfArtists[$currentPage - 1] as $k => $artist) : ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $artist->getName() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $artist->getFormattedDate() ?></h6>
                    <p class="card-text"><?= substr($artist->getBio(), 0, 32) ?>...</p>
                    <a href="artist?id=<?= $artist->getId() ?>" class="card-link text-decoration-none">En savoir plus</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>