<?php


namespace App\Controllers;


use Core\Login;

class ConfirmationDeleteAllAlbumsOfAnArtistController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        if(empty($this->getAlbum($id)))
            $this->redirectWithWarning("L'artiste a bien été effacé.", "dashboard");
        $name = $this->getAlbum($id)->getArtist();
        ob_start();
        require_once ROOT . "/App/Views/confirmationDeleteAllAlbumsOfAnArtist.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate("Confirmation", $content);
    }
}