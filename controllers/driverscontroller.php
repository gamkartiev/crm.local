<?php

/* ------------------- */
class DriversController extends Controller
{
  public function view() {
    $drivers = new Drivers();
    $allDriversName = $drivers->getAllString();
    $oneDriversName = $drivers->getOneString($id);

    include("views/drivers/drivers.php");
  }
}
