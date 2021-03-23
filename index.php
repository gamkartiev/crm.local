<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

require_once ("core/models.php"); // Тут находится базовый класс Моделей
require_once ("core/controllers.php"); //Тут находится базовый класс Контроллеров

include ("core/route.php"); // Загрузка файла роутинга
$_SESSION['login'] = "login";
//Если нет логина, то выкидывает на форму входа на сайт
if(empty($_SESSION['login'])) {
  header("Location: /auth/input/");
}

Route::start();
