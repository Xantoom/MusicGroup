<?php


namespace App\Controllers;


use App\classes\Artist;
use App\Model\ArtistPDO;
use Core\Error;
use Core\Login;

class AddArtistDataController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");

        if(isset($_POST["artistName"]) && $_POST["artistBio"]) {
            $artistName = $_POST["artistName"];
            $artistBio = $_POST["artistBio"];
            if(empty($artistName) || empty($artistBio))
                $this->redirectWithWarning("Des informations sont manquantes.", "addArtist");


            $artistName = addslashes($artistName);
            /**
            if(strpos($artistBio, "'")) {
                $offset = strpos($artistBio, "'");
                $artistBio = substr_replace($artistBio, "'", $offset, 0);
            }*/

            $artistBio = addslashes($artistBio);
            /**
            if(strpos($artistName, "'")) {
                $offset = strpos($artistName, "'");
                $artistBio = substr_replace($artistName, "'", $offset, 0);
            }*/
            $artist = new Artist($artistName, $artistBio);
            $artistPDO = new ArtistPDO();
            if(empty($artistPDO->getArtistByName($artistName))) {
                $artistPDO->addArtist($artist);
                unset($_POST);
                $this->redirectWithWarning("Les données ont bien été ajouté : " . Error::displayError($this->getArtistByName($artistName)), "dashboard");
            } else
                $this->redirectWithWarning("Cet artiste existe déjà dans la base de donnée.", "add/addArtist");
        } else
            $this->redirectWithWarning("Une erreur s'est produite.", "dashboard");

    }
}