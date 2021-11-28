<?php

use App\Controllers\AnnonceController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AnnonceController();
echo $controller->getAnnonce();
