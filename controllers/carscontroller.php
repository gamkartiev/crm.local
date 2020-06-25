<?php
/* ------------------- */
class CarsController extends Controller
{
  public function view() {
    $cars = new Cars();
    $allCarsName = $cars->getAllString();
    $oneCarsName = $cars->getOneString($id);

    include ("views/cars/cars.php");
  }
}
