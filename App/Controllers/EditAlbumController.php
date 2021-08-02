<?php


namespace App\Controllers;


use Core\Login;

class EditAlbumController extends Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");

        $id = $this->getId();
        if(!empty($this->getAlbum($id))) {
            $album = $this->getAlbum($id);
            $songs = implode(",", json_decode($album->getSongs()));
            ob_start();
            require_once ROOT . "/App/Views/editAlbumView.php";
            $content = ob_get_contents();
            ob_end_clean();
            $this->printTemplate("Edition", $content);
        } else
            $this->redirectWithWarning("Cet album n'existe pas.", "dashboard");

    }
}