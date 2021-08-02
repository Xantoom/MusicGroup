<?php


namespace App\Controllers;


class NotFoundController extends Controller {

    public function index() {
        $title = "404";
        ob_start();
        require_once ROOT . '/App/Views/pageNotFoundView.php';
        $content = ob_get_contents();
        ob_end_clean();
        $this->printTemplate($title, $content);
    }
}