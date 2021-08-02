<?php


namespace App\classes;


use App\Model\ArtistPDO;

class Album {

    private int $id;
    private string $name;
    private string $artist;
    private string $songs;
    private int $date;

    /**
     * Album constructor.
     * @param string $name
     * @param string $artist
     * @param string $songs
     */
    public function __construct(string $name = "", string $artist = "", string $songs = "") {
        if(!isset($this->id)) {
            $this->name = $name;
            $this->artist = $artist;
            $this->songs = $songs;
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
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getArtist(): string {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getSongs(): string {
        return $this->songs;
    }

    /**
     * @return array
     */
    public function getSongsArray() : array {
        return unserialize($this->getSongs());
    }

    /**
     * @return int
     */
    public function getDate(): int {
        return $this->date;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @param string $songs
     */
    public function setSongs(string $songs): void {
        $this->songs = $songs;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void {
        $this->date = $date;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist): void {
        $this->artist = $artist;
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
}