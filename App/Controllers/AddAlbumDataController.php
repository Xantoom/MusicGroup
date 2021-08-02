<?php


namespace App\Controllers;


use App\classes\Album;
use App\Model\AlbumPDO;
use Core\Error;
use Core\Login;

class AddAlbumDataController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");

        if(isset($_POST["albumName"]) && isset($_POST["albumSongs"]) && isset($_POST["albumArtist"])) {

            $albumName = $_POST["albumName"];
            $albumSongs = $_POST["albumSongs"];
            $albumArtist = $_POST["albumArtist"];

            if(empty($this->getArtistByName($albumArtist)))
                $this->redirectWithWarning("L'artiste n'existe pas.", "addAlBum");

            if(empty($albumName) || empty($albumSongs) || empty($albumArtist))
                $this->redirectWithWarning("Des informations sont manquantes.", "addAlbum");

            $albumName = addslashes($albumName);
            $albumArtist = addslashes($albumArtist);

            /**
            if(strpos($albumName, "'")) {
                $offset = strpos($albumName, "'");
                $artistBio = substr_replace($albumName, "'", $offset, 0);
            }

            if(strpos($albumSongs, "'")) {
                $offset = strpos($albumSongs, "'");
                $artistBio = substr_replace($albumSongs, "'", $offset, 0);
            }

            if(strpos($albumArtist, "'")) {
                $offset = strpos($albumArtist, "'");
                $artistBio = substr_replace($albumArtist, "'", $offset, 0);
            }*/

            $songs = explode(",", $albumSongs);
            $album = new Album($albumName, $albumArtist, json_encode($songs, JSON_UNESCAPED_UNICODE));

            $albumPDO = new AlbumPDO();

            if(empty($albumPDO->getAlbumByArtistNameAndArtist($albumName, $albumArtist))) {
                $albumPDO->addAlbum($album);
                unset($_POST);
                $this->redirectWithWarning( "{$albumName} - Les données ont bien été ajouté.", "dashboard");
            } else
                $this->redirectWithWarning("Cet album existe déjà", "dashboard");
        } else
            $this->redirectWithWarning("Une erreur s'est produite.", "dashboard");

    }
}