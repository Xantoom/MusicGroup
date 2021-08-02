<?php


namespace App\Controllers;


use App\classes\Album;
use App\classes\Artist;
use App\Model\AlbumPDO;
use App\Model\ArtistPDO;
use Core\Login;
use Core\Redirect;

abstract class Controller {

    public abstract function index();

    /**
     * Print the template with params.
     * @param string $title
     * @param $content
     */
    protected function printTemplate(string $title, $content = null) {
        unset($_SESSION["warning"]);
        $logoRedirection = "home";
        $navbarRedirection = "connection";
        $navbarButton = "Connexion";
        $disconnectButton = "";
        if(Login::isLogged()) {
            $navbarRedirection = "dashboard";
            $navbarButton = "Dashboard";
            $disconnectRedirection = "disconnect";
            $disconnectButton = "<a href=\"{$disconnectRedirection}\" class=\"nav-item btn btn-outline-primary text-white\">Déconnexion</a>";
        }
        require_once dirname(__DIR__) . '/Views/template.php';
    }

    /**
     * Redirect to the page with a warning message at the beginning of the main.
     * @param string $warning
     * @param string $redirectPage
     */
    protected function redirectWithWarning(string $warning, string $redirectPage) {
        $_SESSION['warning'] = $warning;
        header("Location: " . $redirectPage);
    }

    /**
     * Redirect to the page.
     * @param string $redirectPage
     */
    protected function redirect(string $redirectPage) {
        header("Location: " . $redirectPage);
    }


    /**
     * Return the page int.
     * @return int
     */
    protected function getPage(): int {
        $url = $_SERVER["REQUEST_URI"];
        if(strpos($url, "?page=")) {
            $chars = str_split($url);
            $it = 1;
            $k = 1;
            $page = 0;
            do{
                $char = $chars[sizeof($chars) - $k];
                $page += intval($chars[sizeof($chars) - $k]) * $it;
                $it *= 10;
                $k++;
            }while(is_numeric($char));
            return $page;
        }else
            return 1;
    }


    /**
     * Return the id from GET.
     * @return int
     */
    protected function getId(): int {
        $url = $_SERVER["REQUEST_URI"];
        if(strpos($url, "?id=")) {
            $chars = str_split($url);
            $it = 1;
            $k = 1;
            $id = 0;
            do{
                $char = $chars[sizeof($chars) - $k];
                $id += intval($chars[sizeof($chars) - $k]) * $it;
                $it *= 10;
                $k++;
            }while(is_numeric($char));
            return $id;
        }else {
            $this->redirect("home");
            return 0;
        }
    }

    /**
     * Get all artists from the database.
     * @return array
     */
    protected function getAllArtists(): ?array {
        $artistPDO = new ArtistPDO();
        if(!empty($artistPDO->getAllArtists()))
            return $artistPDO->getAllArtists();
        else
            return null;
    }

    /**
     * Get all albums from an artist.
     * @param Artist $artist
     * @return array
     */
    protected function getAllAlbumsByArtist(Artist $artist): ?array {
        $albumPDO = new AlbumPDO();
        if(!empty($albumPDO->getAlbumByArtistName($artist->getName())))
            return $albumPDO->getAlbumByArtistName($artist->getName());
        else
            return null;
    }

    /**
     * Delete Artist with an Id.
     * @param int $id
     */
    protected function deleteArtist(int $id) {
        $artistPDO = new ArtistPDO();
        $artistPDO->deleteArtistById($id);
    }

    /**
     * Delete Album with an Id.
     * @param int $id
     */
    protected function deleteAlbum(int $id) {
        $albumPDO = new AlbumPDO();
        $albumPDO->deleteAlbumById($id);
    }

    /**
     * Delete All Albums of an Artist.
     * @param string $name
     */
    protected function deleteAllAlbumsOfArtist(string $name) {
        $albumPDO = new AlbumPDO();
        $albumPDO->deleteAllAlbumsOfArtist($name);
    }

    /**
     * Return Artist got with the Id.
     * @param int $id
     * @return Artist
     */
    protected function getArtist(int $id): ?Artist {
        $artistPDO = new ArtistPDO();
        if(!empty($artistPDO->getArtistById($id)))
            return $artistPDO->getArtistById($id)[0];
        else
            return null;
    }

    /**
     * Return Artist got with the Name.
     * @param string $name
     * @return mixed|null
     */
    protected function getArtistByName(string $name) {
        $artistPDO = new ArtistPDO();
        if(!empty($artistPDO->getArtistByName($name)))
            return $artistPDO->getArtistByName($name)[0];
        else
            return null;
    }

    /**
     * Return Album got with the Id.
     * @param int $id
     * @return Album
     */
    protected function getAlbum(int $id): ?Album {
        $albumPDO = new AlbumPDO();
        if(!empty($albumPDO->getAlbumById($id)))
            return $albumPDO->getAlbumById($id)[0];
        else
            return null;
    }

    /**
     * Return the album thanks to name and artist.
     * @param string $name
     * @param string $artistName
     * @return array
     */
    protected function getAlbumByNameAndArtist(string $name, string $artistName): array {
        $albumPDO = new AlbumPDO();
        return $albumPDO->getAlbumByArtistNameAndArtist($name, $artistName);
    }

    /**
     * Update artist.
     * @param Artist $artist
     */
    protected function updateArtist(Artist $artist) {
        $artistPDO = new ArtistPDO();
        $artistPDO->updateArtistById($artist->getId(), $artist);
    }

    /**
     * Update album.
     * @param Album $album
     */
    protected function updateAlbum(Album $album) {
        $albumPDO = new AlbumPDO();
        $albumPDO->updateAlbumById($album->getId(), $album);
    }
}