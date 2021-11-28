<?php

namespace App\Controllers;

use App\Services\ReservationService;


class ReservationController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['dateReservation']) &&
            isset($_POST['premiereValidation']) &&
            isset($_POST['validationdefinitive']) &&
            isset($_POST['nbPlacesDemandees'])) {
            // Create the reservation :
            $reservationService = new ReservationService();
            $reservationId = $reservationService->setreservation(
                null,
                $_POST['dateReservation'],
                $_POST['premiereValidation'],
                $_POST['validationdefinitive'],
                $_POST['nbPlacesDemandees']
            );

            
            if ($reservationId && $isOk) {
                $html = 'Reservation créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la reservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservation(): string
    {
        $html = '';

        // Get all reservation :
        $reservationService = new ReservationService();
        $reservation = $reservationService->getReservation();

        // Get html :
        foreach ($reservation as $reservation) {
            $usersHtml = '';
            if (!empty($reservation->getUsers())) {
                foreach ($reservation->getUsers() as $user) {
                    $usersHtml .= $user->getFirstname() . ' ' . $user->lastname() . ' ' . $user->getEmail() . ' ' ;
                }
            }

        
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getDateReservation()->format('d-m-Y')  . ' ' .
                $reservation->getPremiereValidation() . ' ' .
                $reservation->getValidationDefinitive() . ' ' .
                $reservation->getNbPlacesDemandees() . ' ' .
                $usersHtml . '<br />';

        }
                
        

        return $html;
        
    }

    /**
     * Update the reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['dateReservation']) &&
            isset($_POST['premiereValidation']) &&
            isset($_POST['validationDefinitive']) &&
            isset($_POST['nbPlacesDemandees'])) {
            // Update the reservation :
            $reservationService = new ReservationService();
            $isOk = $reservationService->setReservation(
                $_POST['id'],
                $_POST['dateReservation'],
                $_POST['premiereValidation'],
                $_POST['validationdefinitive'],
                $_POST['nbPlacesDemandees']
            );
            if ($isOk) {
                $html = 'Reservation mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la reservation.';
            }
        }

        return $html;
    }

    /**
     * Delete an reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $reservationService = new ReservationService();
            $isOk = $reservationService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Reservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la reservation.';
            }
        }

        return $html;
    }
}
