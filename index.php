<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once ("core/models.php");

require_once ("core/controllers.php"); //Тут находиться базовый класс Controllers

include ("core/route.php");

Route::start();
