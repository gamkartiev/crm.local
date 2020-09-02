<?php
/* ------------------- */
class CarsController extends Controller
{
  public function view($id) {
    $cars = new Cars();

    $allCarsName = $cars->getAllSelect();
    $oneCarsName = $cars->getOneSelect($id);

    $date_start = date("Y-m-d");
    // var_dump($date_start);

    include ("views/cars/cars.php");
  }

  public function add() {
      if (!empty($_POST)) {
        $cars = new Cars();
        // $date_start =

        $values = array(
          $state_sign_cars = $_POST['state_sign_cars'],
          $PTS_cars = $_POST['PTS_cars'],
          $STS_cars = $_POST['STS_cars'],
          $VIN_cars = $_POST['VIN_cars'],
          // $year_cars = $_POST['year_cars'],
          // $attached_trailer = $_POST['attached_trailer'],
          2, //$id_drivers
          1, //id_trailers
          $date_start = date("Y-m-d")  //дата, когда прицепили/изменили прицеп
        );

        $cars->getInsert($values);

        header("Location: /");
        exit();
      } else {
          include("views/cars/carsForm.php");
      }
    }

  public function edit() {}

}
