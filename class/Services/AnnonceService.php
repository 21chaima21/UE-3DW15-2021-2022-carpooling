<?php

namespace App\Services;


use App\Entities\Annonce;

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
}
