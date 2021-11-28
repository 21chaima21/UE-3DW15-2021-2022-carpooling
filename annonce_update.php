<?php

use App\Controllers\AnnonceController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnonceController();
echo $controller->updateAnnonce();
?>

<p>Mise à jour d'une annonce</p>
<form method="post" action="annonce_update.php" name ="annonceUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="title">Titre :</label>
    <input type="text" name="title">
    <br />
    <label for="dates">Date prévue au format dd-mm-yyyy :</label>
    <input type="text" name="dates">
    <br />
    <label for="ride">Trajet :</label>
    <input type="text" name="ride">
    <br />
    <label for="nbrPlacesDisp">Nombre de places disponibles:</label>
    <input type="text" name="nbrPlacesDisp">
    <br />
    <input type="submit" value="Modifier l'annonce">
</form>
