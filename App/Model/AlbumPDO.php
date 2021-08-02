<?php


namespace App\Model;


use App\classes\Album;

class AlbumPDO extends DatabaseConnection {

    /**
     * AlbumPDO constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     */
    public function __construct($host = "localhost", $user = "root", $password = "") {
        parent::__construct($host, $user, $password);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getAlbumById(int $id): array {
        return parent::query(/** @lang text */ "SELECT id, name, artist, songs, date 
        FROM albums 
        WHERE id='$id'", "Album");
    }

    /**
     * @param string $name
     * @return array
     */
    public function getAlbumByName(string $name): array {
        return parent::query(/** @lang text */ "SELECT id, name, artist, songs, date 
        FROM albums 
        WHERE name='$name'", "Album");
    }

    /**
     * @param string $artistName
     * @return array
     */
    public function getAlbumByArtistName(string $artistName): array {
        return parent::query(/** @lang text */ "SELECT id, name, artist, songs, date FROM albums WHERE artist='$artistName'", "Album");
    }

    /**
     * @param string $artistName
     * @return array
     */
    public function getAlbumByArtistNameAndArtist(string $name, string $artistName): array {
        return parent::query(/** @lang text */ "SELECT id, name, artist, songs, date FROM albums WHERE name='$name' AND artist='$artistName'", "Album");
    }

    /**
     * @param Album $album
     * @return null
     */
    public function addAlbum(Album $album) {
        return parent::query(/** @lang text */ "INSERT INTO `albums` (`name`, `artist`, `songs`, `date`) VALUES ('{$album->getName()}', '{$album->getArtist()}', '{$album->getSongs()}', '{$album->getDate()}')");
    }

    /**
     * @param $id
     * @param Album $album
     * @return null
     */
    public function updateAlbumById($id, Album $album) {
        return parent::query(/** @lang text */ "UPDATE albums 
            SET name='{$album->getName()}', artist='{$album->getArtist()}', songs='{$album->getSongs()}', date='{$album->getDate()}' 
            WHERE id='$id'");
    }

    /**
     * @param int $id
     * @return null
     */
    public function deleteAlbumById(int $id) {
        return parent::query(/** @lang text */ "DELETE FROM albums WHERE id='$id'");
    }

    /**
     * @param string $name
     * @return null
     */
    public function deleteAllAlbumsOfArtist(string $name) {
        return parent::query(/** @lang text */ "DELETE FROM albums WHERE artist='{$name}'");
    }
}