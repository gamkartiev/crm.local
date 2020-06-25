<?php

/* ------------------- */
class DriversController extends Controller
{
  public function view($id) {
    // $id = $_GET['id'] ?? 1; //убрать тут единицу и поставить функцию вывода последнего добавленного

    $drivers = new Drivers();
    $allDriversName = $drivers->getAllString();
    $oneDriversName = $drivers->getOneString($id);

    include("views/drivers/drivers.php");
  }
}
