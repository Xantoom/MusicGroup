<?php


namespace App\Model;


use Core\Redirect;
use PDO;
use PDOException;
Use App\classes\User;
Use App\classes\Artist;
Use App\classes\Album;

class DatabaseConnection {

    private string $host;
    private string $user;
    private string $password;
    private string $dbName;

    /**
     * DatabaseConnection constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $dbName
     */
    public function __construct($host = "localhost", $user = "root", $password = "", $dbName = "musicgroup") {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    /**
     * @return PDO
     */
    protected function getConnection(): PDO {
        $options = [
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO('mysql:host='. $this->host . ';dbname=' . $this->dbName . ';charset=utf8', $this->user, $this->password, $options);
    }

    /**
     * @param string $query
     * @param string|null $class
     * @return array // Data or null
     */
    protected function query(string $query, string $class = null): ?array {
        try {
            $statement = $this->getConnection()->prepare($query);
            $statement->execute();
            if (explode(' ', $query)[0] == 'SELECT')
                if (is_null($class)) return $statement->fetchAll();
                else {
                    $class = 'App\classes\\' . $class;
                    return $statement->fetchAll(PDO::FETCH_CLASS, $class);
                }
            else return null;
        }catch (PDOException $e) {
            Redirect::withWarning("Une erreur s'est produite.", "home");
            return null;
        }
    }
}