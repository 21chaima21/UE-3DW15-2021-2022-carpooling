<?php

use App\Controllers\ReservationController;
use App\Services\UsersService;
use App\Services\ReservationService;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationController();
echo $controller->createReservation();



?>

<p>Création d'une reservation</p>
<form method="post" action="reservation_create.php" name ="reservationCreateForm">
    <label for="datereservation">Date de réservation au format dd-mm-yyyy :</label>
    <input type="text" name="datereservation">
    <br />
    <label for="portable">Numéro de telephone :</label>
    <input type="text" name="portable">
    <br />
    <label for="notes">Notes :</label>
    <input type="text" name="notes">
    <br />
    <label for="nbplacesdemandees">Nombre de places :</label>
    <input type="text" name="nbplacesdemandees">
    <br />
    
    

    <input type="submit" value="Créer une reservation">
</form>
