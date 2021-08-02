<?php


namespace App\Controllers;


use Core\Login;

class DisconnectController extends Controller {

    public function index() {
        if($_SESSION["isLogged"] == "true") {
            Login::disconnect();
            $this->redirectWithWarning("Vous avez bien été déconnecté !", "home");
        } else
            header("Location: home");
    }
}