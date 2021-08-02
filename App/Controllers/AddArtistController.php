<?php


namespace App\Controllers;


use Core\Login;

class AddArtistController extends \App\Controllers\Controller
{

    public function index()
    {
        if(!Login::isLogged())
            $this->redirectWithWarning("Vous n'êtes pas connecté.", "home");

        ob_start();
        require_once ROOT . "/App/Views/addArtistView.php";
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate("Ajouter" , $content);
    }
}