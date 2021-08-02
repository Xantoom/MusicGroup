<?php


namespace App\classes;


class Artist {

    private int $id;
    private string $name;
    private string $bio;
    private int $date;

    /**
     * Artist constructor.
     * @param string $name
     * @param string $bio
     */
    public function __construct(string $name = "", string $bio = "") {
        if(!isset($this->id)) {
            $this->name = $name;
            $this->bio = $bio;
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
    public function getBio(): string {
        return htmlspecialchars_decode($this->bio);
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
     * @param string $bio
     */
    public function setBio(string $bio): void {
        $this->bio = $bio;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void {
        $this->date = $date;
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