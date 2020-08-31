<?php
/* ------------------- */
class CarsController extends Controller
{
  public function view($id) {
    $cars = new Cars();
    $allCarsName = $cars->getAllSelect();
    $oneCarsName = $cars->getOneSelect($id);

    include ("views/cars/cars.php");
  }

  public function add() {
      if (!empty($_POST)) {
        $cars = new Cars();

        $state_sign_cars = $_POST['state_sign_cars'];
        $PTS_cars = $_POST['PTS_cars'];
        $STS_cars = $_POST['STS_cars'];
        $VIN_cars = $_POST['VIN_cars'];
        $year_cars = $_POST['year_cars'];
        $attached_trailer = $_POST['attached_trailer'];


        $cars->createString($state_sign_cars, $PTS_cars, $STS_cars, $VIN_cars, $year_cars, $attached_trailer);

        header("Location: /");
        exit();
      } else {
          include("views/cars/carsForm.php");
      }
    }

  public function edit() {}

}
