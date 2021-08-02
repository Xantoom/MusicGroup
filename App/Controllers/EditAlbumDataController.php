<?php


namespace App\Controllers;


use App\Model\AlbumPDO;
use Core\Login;

class EditAlbumDataController extends Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        if(empty($this->getAlbum($id)))
            $this->redirectWithWarning("Cet album n'existe pas.", "dashboard");

        $album = $this->getAlbum($id);

        $albumName = addslashes($_POST["albumName"]);
        $albumArtist = addslashes($_POST["albumArtist"]);
        $albumSongs = $_POST["albumSongs"];


        $songs = json_encode(explode(",", $albumSongs), JSON_UNESCAPED_UNICODE);

        $album->setName($albumName);
        $album->setArtist($albumArtist);
        $album->setSongs($songs);

        $this->updateAlbum($album);

        $this->redirectWithWarning("Les modifications ont bien été prises en compte.", "dashboard");
    }
}