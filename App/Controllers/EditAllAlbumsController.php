<?php


namespace App\Controllers;


use Core\Login;

class EditAllAlbumsController extends Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();
        if(empty($this->getArtist($id)))
            $this->redirectWithWarning("Cet artiste n'a pas d'album.", "dashboard");
        $artist = $this->getArtist($id);
        if(empty($this->getAllAlbumsByArtist($artist)))
            $this->redirectWithWarning("Cet artiste n'a pas d'album", "dashboard");
        $albums = $this->getAllAlbumsByArtist($artist);
        ob_start();
        require_once ROOT . "/App/Views/editAllAlbumsView.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate("Edition", $content);
    }
}