<?php


namespace App;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

// In lieu of a router simply use the controller
use App\Controllers\Home;


// Call our Home page
echo Home::index();

