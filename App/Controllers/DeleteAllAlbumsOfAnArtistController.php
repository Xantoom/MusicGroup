<?php


namespace App\Controllers;


use Core\Login;

class DeleteAllAlbumsOfAnArtistController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        if(!empty($this->getArtist($id))) {
            $name = $this->getArtist($id)->getName();
            $this->deleteAllAlbumsOfArtist($name);
            $this->redirectWithWarning("Tous les albums de ". $name . " ont bien été supprimé.", "dashboard");
        } else
            $this->redirectWithWarning("L'artiste a bien été supprimé, mais il n'y avait aucun albums pour cet artiste.", "dashboard");

    }
}