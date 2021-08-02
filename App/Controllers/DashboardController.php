<?php


namespace App\Controllers;


use Core\Error;
use Core\Login;

class DashboardController extends Controller {

    public function index() {
        if (!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        ob_start();
        $arrayOfAllArtists = $this->getAllArtists();
        if(!empty($arrayOfAllArtists)) {
            $numberOfPages = (ceil(count($arrayOfAllArtists) / 10) == count($arrayOfAllArtists) / 10) ? (count($arrayOfAllArtists) / 10) + 1 : (ceil(count($arrayOfAllArtists) / 10));
            $currentPage = $this->getPage();

            if ($currentPage > $numberOfPages)
                $this->redirect("?page=" . $numberOfPages);
            if ($currentPage <= 0)
                $this->redirect("?page=1");
            if ($currentPage <= 1)
                $disabledPrevious = "disabled";
            if ($numberOfPages <= $currentPage)
                $disabledNext = "disabled";

            $previousPage = $currentPage - 1;
            $previousPageLink = "?page=" . $previousPage;
            $nextPage = $currentPage + 1;
            $nextPageLink = "?page=" . $nextPage;

            $arrayOfAllArtists = array_reverse($arrayOfAllArtists);
            $arrayOfArtists = array_chunk($arrayOfAllArtists, 9);
        }
        if(!empty($_SESSION["warning"])) {
            $warning = $_SESSION["warning"];
            require_once ROOT . '/App/Views/errorView.php';
        }
        require_once ROOT . "/App/Views/dashboardView.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate("Dashboard", $content);
    }
}