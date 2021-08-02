<?php


namespace Core;

use App\Controllers\HomeController;
use App\Controllers\NotFoundController;

class Router {

    public function start() {
        session_start();
        $url = $_SERVER['REQUEST_URI'];
        if(!empty($url) && $url != '/' && $url[-1] === "/"){
            $url = substr($url, 0, -1);
            http_response_code(301);
            header('Location: ' . $url);
        }
        $params = [];
        if(isset($_GET['p']))
            $params = explode('/', $_GET['p']);
        if(count($params) > 1) {
            header("Location: http://localhost/MusicGroup/public/" . end($params));
            exit();
        }
        if(!empty($params) && $params[0] != '') {
            $controller = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';
            if(file_exists(ROOT . $controller . ".php")) {
                $controller = new $controller();
                $controller->index();
            } else {
                $notFound = new NotFoundController();
                $notFound->index();
            }
        } else {
            $home = new HomeController();
            $home->index();
        }
    }
}