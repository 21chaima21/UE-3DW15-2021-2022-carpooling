<?php

use App\Controllers\ReservationController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationController();
echo $controller->updateReservation();
?>

<p>Mise à jour d'une reservation</p>
<form method="post" action="reservation_update.php" name ="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="datereservation">Date de reservation au format dd-mm-yyyy  :</label>
    <input type="text" name="datereservation">
    <br />
    <label for="premierevalidation">Premiere validation :</label>
    <input type="text" name="premierevalidation">
    <br />
    <label for="validationdefinitive">Validation Difinitive :</label>
    <input type="text" name="validationdefinitive">
    <br />
    <label for="nbplacesdemandees">Nombre de places demandées :</label>
    <input type="text" name="nbplacesdemandees">
    <br />
    <input type="submit" value="Modifier la reservation">
</form>
