<?php

class Controller
{

public function refender() {}
  //метод, который загружает файл из views
}


/* ------------------- */
class FlightsController extends Controller
{
    public function view() {
    $flights = new Flights();
    $allFlights = $flights->getAllString();

    require("views/flights/flights_all.php");
  }

    public function add() {
        if (!empty($_POST)) {
          $flights = new Flights();

          $place_1 = $_POST['place_1'];
          $place_2 = $_POST['place_2'];
          $date_1 = $_POST['date_1'];
          $date_2 = $_POST['date_2'];
          $freight = $_POST['freight'];
          $weight = $_POST['weight'];
          $volume = $_POST['volume'];
          $cost = $_POST['cost'];
            $flights->createString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost);
          header("Location: /");
        } else {
            include("views/flights/flightForm.php");
            exit();
        }
      }

  public function edit() {}
}




/* ------------------- */
class ActualController extends Controller
{
  public function view() {
    include("views/actual/actual.php");
  }
}


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


/* ------------------- */
class CustomersController extends Controller
{
  public function view() {
    $customers = new Customers();
    $allCustomers = $customers->getAllString();
    $oneCustomersName = $customers->getOneString($id);

    include ("views/customers/customers.php");
  }
}


/* ------------------- */
class DriversController extends Controller
{
  public function view() {
    $drivers = new Drivers();
    $allDriversName = $drivers->getAllString();
    $oneDriversName = $drivers->getOneString($id);

    include ("views/drivers/drivers.php");
  }
}


/* ------------------- */
class FinancePlanController extends Controller
{
  public function view() {
    include("views/404.php");
  }
}
