<?php


namespace App\Controllers;


use App\Model\ArtistPDO;
use Core\Login;

class EditArtistDataController extends Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();

        if(empty($this->getArtist($id)))
            $this->redirectWithWarning("Cet artiste n'existe pas.", "dashboard");
        $artist = $this->getArtist($id);

        $artistName = addslashes($_POST["artistName"]);
        $artistBio = addslashes($_POST["artistBio"]);

        $artist->setName($artistName);
        $artist->setBio($artistBio);

        if($artist->getDate() == 0) {
            $artist->setDate(time());
        }

        $this->updateArtist($artist);
        $this->redirectWithWarning("Les modifications ont bien été prises en compte.", "dashboard");
    }
}