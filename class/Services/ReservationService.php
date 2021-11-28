<?php

namespace App\Services;

use App\Entities\Car;
use App\Entities\User;
use App\Entities\Reservation;
use DateTime;

class ReservationService
{
    /**
     * Return all Reservation.
     */
    public function getReservation(): array
    {
        $reservation = [];

        $dataBaseService = new DataBaseService();
        $reservationDTO = $dataBaseService->getReservation();
        if (!empty($reservationDTO)) {
            foreach ($reservationDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $date = new DateTime($reservationDTO['setdateReservation']);   //Pour la date
                if ($date !== false) {
                    $reservation->setDateReservation($date);
                }
                
                $reservation->setPortable($reservationDTO['setPortable']);
                $reservation->setNotes($reservationDTO['setNotes']);
                $reservation->setNbPlacesDemandees($reservationDTO['setNbPlacesDemandees']);
                $reservation[] = $reservation;
            }
        }

        return $reservation;
    }

    /**
     * Create or update an reservation.
     */
    public function setReservation(?string $id, string $datereservation, string $laspremierereservation, string $validationdefinitive, string $nbplacedemandees): string
    {
        $reservationId = '';

        $dataBaseService = new DataBaseService();
        $datereservation = new DateTime($datereservation);
        if (empty($id)) {
            $reservationId = $dataBaseService->createReservation($datereservation, $portable, $notes, $nbplacedemandees);
        } else {
            $dataBaseService->updateReservation($id, $datereservation, $portable, $notes, $nbplacedemandees);
            $reservationId = $id;
        }

        return $reservationId;
    }
}
