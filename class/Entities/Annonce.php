<?php

namespace App\Entities;

use DateTime;

class Annonce
{
    private $id;
    private $title;
    private $dates;
    private $ride;
    private $nbrPlacesDisp;
    private $description;
    private $reservation;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDates(): string
    {
        return $this->dates;
    }

    public function setDates(string $dates): void
    {
        $this->dates = $dates;
    }

    public function getRide(): string
    {
        return $this->ride;
    }

    public function setRide($ride): void
    {
        $this->ride = $ride;
    }

    public function getNbrPlacesDisp(): string
    {
        return $this->nbrPlacesDisp;
    }

    public function setNbrPlacesDisp(string $nbrPlacesDisp): void
    {
        $this->nbrPlacesDisp = $nbrPlacesDisp;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    
    public function getReservation(): string
    {
        return $this->reservation;
    }

    public function setReservation(string $reservation): void
    {
        $this->reservation = $reservation;
    }
}
