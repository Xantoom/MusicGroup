<?php


namespace App\Controllers;


use Core\Login;

class DeleteArtistController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        if(!empty($this->getArtist($id))) {
            $name = $this->getArtist($id)->getName();
            $this->deleteArtist($id);
            $this->redirect("confirmationDeleteAllAlbumsOfAnArtist?id={$id}");
        } else
            $this->redirectWithWarning("Cet artiste n'existe pas.", "dashboard");

    }
}