<?php


namespace App\Controllers;


use App\Model\AlbumPDO;
use App\Model\ArtistPDO;
use Core\Login;

class EditArtistController extends Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");
        $id = $this->getId();

        if(empty($this->getArtist($id)))
            $this->redirectWithWarning("Cet artiste n'existe pas.", "dashboard");
        $artist = $this->getArtist($id);

        $title = "Edition";
        ob_start();
        require_once ROOT . "/App/Views/editArtistView.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate($title, $content);
    }
}