<?php


namespace App\Model;


use App\classes\Artist;

class ArtistPDO extends DatabaseConnection {

    /**
     * ArtistPDO constructor.
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
    public function getAllArtists(): ?array {
        return parent::query(/** @lang text */"SELECT id, name, bio, date FROM artists", "Artist");
    }

    /**
     * @param int $id
     * @return array
     */
    public function getArtistById(int $id): array {
        return parent::query(/** @lang text */"SELECT id, name, bio, date FROM artists WHERE id='$id'", "Artist");
    }

    /**
     * @param string $name
     * @return array
     */
    public function getArtistByName(string $name): array {
        return parent::query(/** @lang text */"SELECT id, name, bio, date FROM artists WHERE name='$name'", "Artist");
    }

    /**
     * @param Artist $artist
     * @return null
     */
    public function addArtist(Artist $artist) {
        return parent::query(/** @lang text */ "INSERT INTO `artists` (`name`, `bio`, `date`) 
        VALUES ('{$artist->getName()}', '{$artist->getBio()}', '{$artist->getDate()}')");
    }

    /**
     * @param $id
     * @param Artist $artist
     * @return null
     */
    public function updateArtistById($id, Artist $artist) {
        return parent::query(/** @lang text */ "UPDATE artists SET name='{$artist->getName()}', bio='{$artist->getBio()}', date='{$artist->getDate()}' WHERE id='$id'");
    }

    /**
     * @param $id
     * @return null
     */
    public function deleteArtistById($id) {
        return parent::query(/** @lang text */ "DELETE FROM artists WHERE id='$id'");
    }

}