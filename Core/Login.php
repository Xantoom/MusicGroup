<?php


namespace Core;


use App\classes\User;
use App\Model\UserPDO;

class Login {

    /**
     * Check if the current logged user is in the database.
     * @return bool
     */
    public static function isLogged(): bool {
        if(empty($_SESSION['isLogged'])) return false;
        if($_SESSION['isLogged'] === "true") {
            $userPDO = new UserPDO();
            if(!empty($userPDO->getUserByName($_SESSION["username"])[0])) {
                $user = $userPDO->getUserByName($_SESSION["username"])[0];
                if(!empty($user))
                    return true;
                else
                    return false;
            }
            return false;
        }
        else return false;
    }

    /**
     * Register current user in the database.
     */
    public static function register() {
        $user = new User($_SESSION['username'], password_hash($_SESSION['password'], PASSWORD_DEFAULT), $_SESSION["email"]);
        $userPDO = new UserPDO();
        $userPDO->addUser($user);
    }

    /**
     * Delete current User from the database.
     */
    public static function delete() {
        $userPDO = new UserPDO();
        $userPDO->deleteUserByName($_SESSION['username']);
    }

    /**
     * Disconnect the current logged user.
     */
    public static function disconnect() {
        unset($_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['isLogged']);
    }
}