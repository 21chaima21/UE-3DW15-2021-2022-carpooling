
<?php

namespace App\Services;


use App\Entities\Annonce;
use App\Entities\Car;
use App\Entities\reservation;


class AnnonceService
{
    /**
     * Create or update an annonce.
     */
    public function setAnnonce(?string $id, string $title, string $dates, string $ride, string $nbrPlacesDisp, string $description): string
    {
        $annonceId = '';

        $dataBaseService = new DataBaseService();
    
        if (empty($id)) {
            $annonceId = $dataBaseService->createAnnonce($title, $dates, $ride, $nbrPlacesDisp, $description);
        } else {
            $dataBaseService->updateAnnonce($id, $title, $dates, $ride, $nbrPlacesDisp, $description);
            $annonceId = $id;
        }

        return $annonceId;
    }

    /**
     * Return all annonce.
     */
    public function getAnnonce(): array
    {
        $annonce = [];

        $dataBaseService = new DataBaseService();
        $annonceDTO = $dataBaseService->getAnnonce();
        if (!empty($annonceDTO)) {
            foreach ($annonceDTO as $annonceDTO) {
                // Get annonce:
                $annonce = new Annonce();
                $annonce->setId($annonceDTO['id']);
                $annonce->setTitle($annonceDTO['title']);
                $annonce->setDates($annonceDTO['dates']);
                $annonce->setRide($annonceDTO['ride']);
                $annonce->setNbrPlacesDisp($annonceDTO['nbrePlacesDisp']);
                $annonce->setDescription($annonceDTO['description']);

            
            }
            // Get reservation of this Annonce :
                $reservation = $this->getAnnonceReservation($AnnonceDTO['id']);
                $annonce->setReservation($reservation);

                $annonce[] = $annonce;
        }

        return $annonce;
    }

    /**
     * Delete an annonce.
     */
    public function deleteAnnonce(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAnnonce($id);

        return $isOk;
    }
    
    /**
     * Create relation bewteen an annonce and his car.
     */
    public function setAnnonceCar(string $annonceId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceCar($annonceId, $carId);

        return $isOk;
    }

    /**
     * Get cars of given annonce id.
     */
    public function getAnnonceCars(string $annonceId): array
    {
        $annonceCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation annonce and cars :
        $annonceCarsDTO = $dataBaseService->getAnnonceCars($annonceId);
        if (!empty($annonceCarsDTO)) {
            foreach ($annonceCarsDTO as $annonceCarDTO) {
                $car = new Car();
                $car->setId($annonceCarDTO['id']);
                $car->setBrand($annonceCarDTO['brand']);
                $car->setModel($annonceCarDTO['model']);
                $car->setColor($annonceCarDTO['color']);
                $car->setNbrSlots($annonceCarDTO['nbrSlots']);
                $annonceCars[] = $car;
            }
        }

        return $annonceCars;
    }
    
    /**
     * Create relation bewteen an annonce and his reservation.
     */
    public function setAnnonceReservation(string $annonceId, string $reservationId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceReservation($annonceId, $reservationId);

        return $isOk;
    }

    /**
     * Get reservation of given annonce id.
     */
    public function getAnnonceReservation(string $annonceId): array
    {
        $annonceReservation = [];

        $dataBaseService = new DataBaseService();

        // Get relation annonce and reservation :
        $annonceReservationDTO = $dataBaseService->getAnnonceReservation($annonceId);
        if (!empty($annonceReservationDTO)) {
            foreach ($annonceReservationDTO as $annonceReservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($userCarDTO['id']);
                $reservation->setDateReservation($userReservationDTO['dateReservation']);
                $reservation->setPortable($userReservationDTO['portable']);
                $reservation->setNotes($userReservationDTO['notes']);
                $reservation->setNbPlacesDemandees($userReservationDTO['nbPlacesDemandees']);
                $annonceReservation[] = $reservation;
            }
        }

        return $annonceReservations;
    }
}
