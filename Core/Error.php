<?php


namespace Core;


class Error {

    public static function displayError(...$data) {
        foreach($data as $d) {
            echo "<pre>";
            var_dump($d);
            echo "</pre>";
            echo "<br><br>";
        }
    }
}