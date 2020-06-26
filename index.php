<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once ("core/models.php");

require_once ("core/controllers.php"); //Тут находиться базовый класс Controllers

include ("core/route.php");

Route::start();



// //если задан переход по странице(selectedPage), иначе selectedPage - пустое
// $selectedPage = $_GET['selectedPage'] ?? "";
// $id = $_GET['id'] ?? 1; //убрать тут единицу и поставить функцию вывода последнего добавленного
//
// //	------------------------ //
// if ($selectedPage == 'actual') {
//     include ("views/actual.php");
//
// } elseif ($selectedPage == 'drivers') {
//     $oneDriversName = $drivers->getOneString($id);
//     include ("views/drivers.php");
//
// } elseif ($selectedPage == 'cars') {
//     $oneCarsName = $cars->getOneString($id);
//     include ("views/cars.php");
//
// } elseif ($selectedPage == 'customers') {
//     $oneCustomersName = $customers->getOneString($id);
//     include ("views/customers.php");
//
// } elseif ($selectedPage == 'financePlan') {
//     include ('views/404.php');
//     exit();
//
// } else {
//     include ("views/flights_all.php");
// }
// // ------------------------------- //
