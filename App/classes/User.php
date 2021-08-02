<?php


namespace App\classes;


class User {

    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private int $date;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(string $username = "", string $password = "", string $email = "") {
        if(!isset($this->id)) {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->date = time() + (3600*2) ; // Time in France
        }
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getDate(): int {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Return the formatted date.
     * @return string
     */
    public function getFormattedDate(): string {
        $date = date("d/m/Y", $this->date);
        $hour = date("H", $this->date);
        $minutes = date("i", $this->date);
        return "Ajouté le {$date} à {$hour}h{$minutes}.";
    }

    /**
     * Check if the two password are the same.
     * @param string $password
     * @param string $dbPassword
     * @return bool
     */
    public static function verifyPassword(string $password, string $dbPassword): bool {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        if($hashPassword === $dbPassword) return true;
        else return false;
    }

}