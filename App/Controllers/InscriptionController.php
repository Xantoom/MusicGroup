<?php


namespace App\Controllers;


use Core\Login;

class InscriptionController extends Controller {

    public function index() {
        if(Login::isLogged()) {
            $this->redirectWithWarning("Vous êtes déjà connecté.", "home");
            return;
        }
        $title = "Inscription";
        ob_start();
        if(!empty($_SESSION["warning"])) {
            $warning = $_SESSION["warning"];
            require_once ROOT . '/App/Views/errorView.php';
        }
        require_once ROOT . '/App/Views/inscriptionView.php';
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate($title, $content);
    }
}