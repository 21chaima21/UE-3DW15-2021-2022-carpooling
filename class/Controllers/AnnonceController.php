<?php

namespace App\Controllers;

use App\Services\AnnonceService;

class AnnonceController
{
    /**
     * Return the html for the create action.
     */
    public function createAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['title']) &&
            isset($_POST['dates']) &&
            isset($_POST['ride']) &&
            isset($_POST['nbrPlacesDisp']) &&
            isset($_POST['description']) &&           
            isset($_POST['reservation'])) {
            // Create the annonce :
            $annonceService = new AnnonceService();
            $annonceId = $annonceService->setAnnonce(
                null,
                $_POST['title'],
                $_POST['dates'],
                $_POST['ride'],
                $_POST['nbrPlaceDisp'],
                $_POST['description']
            );


        }
    }

    /**
     * Update the annonce.
     */
    public function updateAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['dates']) &&
            isset($_POST['ride']) &&
            isset($_POST['nbrPlacesDisp']) &&
            isset($_POST['description'])) {
            // Update the annonce :
            $annonceService = new AnnonceService();
            $isOk = $annonceService->setAnnonce(
                $_POST['id'],
                $_POST['title'],
                $_POST['dates'],
                $_POST['ride'],
                $_POST['nbrPlacesDisp'],
                $_POST['description']
            );
            if ($isOk) {
                $html = 'Annonce mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an annonce.
     */
    public function deleteAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the annonce :
            $annonceService = new AnnonceService();
            $isOk = $annonceService->deleteAnnonce($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
