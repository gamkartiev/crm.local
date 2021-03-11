<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once ("core/models.php");

require_once ("core/controllers.php"); //Тут находиться базовый класс Controllers

include ("core/route.php");

Route::start();
