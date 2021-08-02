<?php


namespace App\Controllers;


class HomeController extends Controller {

    public function index() {
        $title = "Home";
        ob_start();
        if(!empty($_SESSION["warning"])) {
            $warning = $_SESSION["warning"];
            require_once ROOT . '/App/Views/errorView.php';
        }
        $arrayOfAllArtists = $this->getAllArtists();
        if(empty($arrayOfAllArtists)) {
            $warning = "Aucune donnée.";
            require_once ROOT . '/App/Views/errorView.php';
        } else {
            $numberOfPages = ceil(count($arrayOfAllArtists) / 10);
            $currentPage = $this->getPage();

            if($currentPage > $numberOfPages)
                $this->redirect("?page=" . $numberOfPages);
            if($currentPage <= 0)
                $this->redirect("?page=1");
            if($currentPage <= 1)
                $disabledPrevious = "disabled";
            if($numberOfPages <= $currentPage)
                $disabledNext = "disabled";

            $previousPage = $currentPage - 1;
            $previousPageLink = "?page=" . $previousPage;
            $nextPage = $currentPage + 1;
            $nextPageLink = "?page=" . $nextPage;

            $arrayOfAllArtists = array_reverse($arrayOfAllArtists);
            $arrayOfArtists = array_chunk($arrayOfAllArtists, 9);

            require_once ROOT . '/App/Views/homeView.php';
        }
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate($title, $content);
    }

}