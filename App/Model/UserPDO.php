<?php


namespace App\Model;


use App\classes\User;

class UserPDO extends DatabaseConnection {

    /**
     * UserPDO constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     */
    public function __construct($host = "localhost", $user = "root", $password = "") {
        parent::__construct($host, $user, $password);
    }

    /**
     * @return array
     */
    public function getAllUsers(): ?array {
        return parent::query(/** @lang text */
            "SELECT id, username, password, email, date 
            FROM users", "User");
    }

    /**
     * @param int $id
     * @return User|array|null
     */
    public function getUserById(int $id) {
        return parent::query(/** @lang text */
            "SELECT id, username, password, email, date 
            FROM users WHERE id='$id'", "User")[0];
    }

    /**
     * @param string $name
     * @return array|null
     */
    public function getUserByName(string $name): ?array {
        return parent::query(/** @lang text */
            "SELECT id, username, password, email, date FROM users WHERE username='$name'", "User");
    }

    /**
     * @param string $email
     * @return array|null
     */
    public function getUserByEmail(string $email): ?array {
        return parent::query(/** @lang text */
            "SELECT id, username, password, email, date FROM users WHERE email='$email'", "User");
    }

    /**
     * @param User $user
     * @return null
     */
    public function addUser(User $user) {
        return parent::query(/** @lang text */
            "INSERT INTO users (username, password, email, date) 
            VALUES ('{$user->getUserName()}', '{$user->getPassword()}', '{$user->getEmail()}', '{$user->getDate()}')");
    }

    /**
     * @param $id
     * @param User $user
     */
    public function updateUserById($id, User $user) {
        parent::query(/** @lang text */
            "UPDATE users 
            SET username='{$user->getUserName()}', password='{$user->getPassword()}', email='{$user->getEmail()}, date='{$user->getDate()}' 
            WHERE id='$id'");
    }

    /**
     * @param $name
     * @param User $user
     */
    public function updateUserByName($name, User $user) {
        parent::query(/** @lang text */
            "UPDATE users
            SET username='{$user->getUserName()}', password='{$user->getPassword()}', email='{$user->getEmail()}, date='{$user->getDate()}' 
            WHERE name='$name'");
    }

    /**
     * @param $id
     */
    public function deleteUserById($id) {
        parent::query(/** @lang text */ "DELETE FROM users WHERE id='$id'");
    }

    /**
     * @param $name
     */
    public function deleteUserByName($name) {
        parent::query(/** @lang text */ "DELETE FROM users WHERE name='$name'");
    }
}