<?php
use App\general\ajax;
use App\general\constante;
use App\general\database;
use App\general\date;
use App\general\download;
use App\general\images;
use App\general\insert;
use App\general\number;
use App\general\redirect;
use App\general\generator;
use App\general\ssh;

require dirname(__DIR__)."/vendor/autoload.php";

$constante = new constante();
$redirect = new redirect();
$date = new date();
$db = new database();
$generator = new generator();
$number = new number();
$download = new download();
$ajax = new ajax();
$ssh = new ssh();
$images = new images();
$insert = new insert();

// END FRAMEWORK INCLUSION //

// START INCLUSION APPLICATION CLASS //



// END INCLUSION APPLICATION CLASS //