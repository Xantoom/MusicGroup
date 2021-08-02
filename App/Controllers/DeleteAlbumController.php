<?php


namespace App\Controllers;


use Core\Login;

class DeleteAlbumController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        if(!empty($this->getAlbum($id))) {
            $name = $this->getAlbum($id)->getName();
            $this->deleteAlbum($id);
            $this->redirectWithWarning("L'album " . $name . " a bien été supprimé.", "dashboard");
        } else
            $this->redirectWithWarning("Cet album n'existe pas.", "dashboard");
    }
}