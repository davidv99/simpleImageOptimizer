<?php

error_reporting(E_ALL);

require_once __DIR__.'/../vendor/autoload.php';

use DavidValbuena\Image;

$image = new Image(assets_path('img/image.jpeg'), 800, 600, false, 10);

header('Content-Type: image/jpeg');
imagejpeg($image->draw(), null);
