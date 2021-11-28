<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $dateReservation;
    private $premiereValidation;
    private $validationDefinitive;
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

    public function getPremiereValidation(): string
    {
        return $this->PremiereValidation;
    }

    public function setPremiereValidation(string $premiereValidation): self
    {
        $this->premiereValidation = $premiereValidation;

        return $this;
    }

    public function getValidationDefinitive(): string
    {
        return $this->validationDefinitive;
    }

    public function setValidationDefinitive(string $validationDefinitive): self
    {
        $this->validationDefinitive = $validationDefinitive;

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
