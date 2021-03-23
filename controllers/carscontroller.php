<?php
/* ------------------- */
class CarsController extends Controller
{
  public function view($id) {
    $cars = new Cars();

    $allCarsName = $cars->getAllSelect();
    $oneCarName = $cars->getOneSelect($id);

    // var_export($oneCarName);

    include ("views/cars/cars.php");
  }

  //-----------создание-----------------//
  public function add() {
      if (!empty($_POST)) {
        $cars = new Cars();

        $values = array(
          $brand = $_POST['brand'],
          $state_sign_cars = $_POST['state_sign_cars'],
          $PTS_cars = $_POST['PTS_cars'],
          $STS_cars = $_POST['STS_cars'],
          $VIN_cars = $_POST['VIN_cars'],
        );

        $cars->getInsert($values);

        header("Location: /cars");
        exit();
      } else {
          include("views/cars/carsForm.php");
      }
    }

  //-----------редактирование-----------------//
  public function edit($id) {
    if(!empty($_POST)&& $id > 0) {

      $values = array(
        $state_sign_cars = $_POST['state_sign_cars'],
        $PTS_cars = $_POST['PTS_cars'],
        $STS_cars = $_POST['STS_cars'],
        $VIN_cars = $_POST['VIN_cars'],
      );

      $cars = new Cars();
      $cars->getEdit($id, $values);

      header("location: /cars/view/".$id);
      exit();
    } else {
      $cars = new Cars();
      $oneCarsName = $cars->getOneSelect($id);

      include("views/cars/carsFormEdit.php");
    }
  }

  //-----------удаление-----------------//
  public function delete($id) {
    if ($id > 0){
      $cars = new Cars();
      $cars->deleteCar($id);

      header("Location: /cars");
      exit();
    } else {
      header("Location: /cars");
      exit();
    }
  }

}
