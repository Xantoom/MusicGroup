<?php


namespace App\Controllers;


use App\Model\UserPDO;
use Core\Login;

class LoginController extends Controller {

    public function index() {
        if(Login::isLogged()) {
            $this->redirectWithWarning("Vous êtes déjà connecté.", "home");
            return;
        }
        switch ($_POST["from"]) {
            case "connection":
                $this->connection();
                break;
            case "inscription":
                $this->inscription();
                break;
            default:
                $this->redirectWithWarning("Une erreur s'est produite.", "home");
                break;
        }
    }

    /**
     * Connection.
     */
    private function connection() {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $userPDO = new UserPDO();
        if(!empty($userPDO->getUserByName($username))) {
            $user = $userPDO->getUserByName($username);
            if(password_verify($password, $user[0]->getPassword())) {
                $_SESSION["isLogged"] = "true";
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $this->redirectWithWarning("Vous êtes connecté !", "home");
            } else {
                $this->redirectWithWarning("Le mot de passe est incorrect.", "inscription");
                return;
            }
        } else $this->redirectWithWarning("L'utilisateur " . $username . " n'existe pas dans la base de donnée.", "connection");
    }

    /**
     * Inscription.
     */
    private function inscription() {

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        if(!$this->checkString($username, '/[\'^£$%&*()}{@#~?><>,|=._+¬-]/')) {
            $this->redirectWithWarning("Votre nom d'utilisateur contient des caractères non autorisés.", "inscription");
            return;
        }

        if(!$this->checkString($email, '/[\'^£$%&*()}{#~?><>,|=_+¬-]/')) {
            $this->redirectWithWarning("Votre adresse mail contient des caractères non autorisés.", "inscription");
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirectWithWarning("L'adresse mail fourni n'est pas réglementaire.", "inscription");
            return;
        }

        if(strpos($username, " ") || strpos($password, " ") || strpos($email, " ")) {
            $this->redirectWithWarning("Vos informations contiennent des caractères non autorisés.", "inscription");
            return;
        }

        $userPDO = new UserPDO();
        if(empty($userPDO->getUserByName($username))) {
            if(!empty($userPDO->getUserByEmail($email))) {
                $this->redirectWithWarning("L'adresse mail " . $email . " a déjà été utilisé.", "inscription");
                return;
            }
            $_SESSION['isLogged'] = "true";
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            Login::register();
            $this->redirectWithWarning("Inscription terminée, bienvenue sur MusicGroup !", "home");
        } else
            $this->redirectWithWarning("L'utilisateur " . $username . " existe déjà.", "inscription");
    }

    /**
     * Check if string passed respect Regex.
     * @param string $str
     * @param string $regexStr
     * @return bool
     */
    private function checkString(string $str, string $regexStr): bool {
        $regex = preg_match($regexStr, $str);
        if(empty($regex)) return true;
        else return false;
    }
}