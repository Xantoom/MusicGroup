<?php


namespace App\Controllers;


use Core\Login;

class ConfirmationDeleteAlbumController extends \App\Controllers\Controller {

    public function index() {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        $name = $this->getAlbum($id)->getName();
        ob_start();
        require_once ROOT . "/App/Views/confirmationDeleteAlbum.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate("Confirmation", $content);
    }
}