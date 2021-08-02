<?php


namespace App\Controllers;


use App\classes\Album;
use App\Model\AlbumPDO;
use App\Model\ArtistPDO;

class ArtistController extends Controller {

    public function index() {
        $id = $this->getId();
        $currentArtist = $this->getArtist($id);
        if(empty($currentArtist))
            $this->redirect("home");
        $title = $currentArtist->getName();
        ob_start();
        if(!(empty($this->getAllAlbumsByArtist($currentArtist))))
            $albums = array_reverse($this->getAllAlbumsByArtist($currentArtist));
        require_once ROOT . "/App/Views/artistView.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate($title, $content);
    }

}