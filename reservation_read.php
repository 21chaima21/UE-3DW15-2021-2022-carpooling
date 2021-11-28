<?php

use App\Controllers\ReservationController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationController();  //Le controller qui va gerer toutes les actions
echo $controller->getReservation();
