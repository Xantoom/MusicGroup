<?php

Use Core\Router;

define('ROOT', dirname(__DIR__));

require dirname(__DIR__) . '/vendor/autoload.php';

$app = new Router();

$app->start();

