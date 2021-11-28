<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $dateReservation;
    private $portable;
    private $notes;
    private $nbPlacesDemandees;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDateReservation(): DateTime
    {
        return $this->DateReservation;
    }

    public function setDateReservation(DateTime $DateReservation): void
    {
        $this->DateReservation = $DateReservation;   
    }

    public function getPortable(): string
    {
        return $this->Portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getNbPlacesDemandees(): int
    {
        return $this->nbPlacesDemandees;
    }

    public function setNbPlacesDemandees(int $nbPlacesDemandees): self
    {
        $this->nbPlacesDemandees = $nbPlacesDemandees;

        return $this;
    }
    
}
