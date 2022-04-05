<?php

/* ------------------- */
class DriversController extends Controller
{

  //-----------выведение всех строк-----------------//
  public function view($id) {
    // $id = $_GET['id'] ?? 1; //убрать тут единицу и поставить функцию вывода последнего добавленного

    $drivers = new Drivers();
    $allDriversName = $drivers->getAllSelect();
    $oneDriverName = $drivers->getOneSelect($id);

    include("views/drivers/drivers.php");
  }


//-----------создание-----------------//
  public function add() {
      if (!empty($_POST)) {
        $drivers = new Drivers();

        $values = array(
          $driver = $_POST['driver'],
          // $first_name = $_POST['first_name'],
          // $patronymic = $_POST['patronymic'],
          $date_of_birth = $_POST['date_of_birth'],
          $place_of_birth = $_POST['place_of_birth'],
          $passport = $_POST['passport'],
          $registration = $_POST['registration'],
          $drivers_license = $_POST['drivers_license'],
          $phone_1 = $_POST['phone_1'],
          $phone_2 = $_POST['phone_2'],
          $phone_3 = $_POST['phone_3']
        );

        $drivers->getInsert($values);

        $values = array(
          $driver = $_POST['driver'],
          // $first_name = $_POST['first_name'],
          // $patronymic = $_POST['patronymic'],
          $driver = $_POST['date_of_birth'],
        );

        //для открытия последней добавленной строчки(водителя)
        $id = $drivers->getLastInsertId($values);

        header("Location: /drivers/view/".$id);
        exit();
      } else {
          include("views/drivers/driversForm.php");
      }
    }


//-----------редактирование-----------------//
  public function edit($id) {
    if (!empty($_POST)&& $id > 0) {
      $drivers = new Drivers();

      $values = array(
        $driver = $_POST['driver'],
        // $first_name = $_POST['first_name'],
        // $patronymic = $_POST['patronymic'],
        $date_of_birth = $_POST['date_of_birth'],
        $place_of_birth = $_POST['place_of_birth'],
        $passport = $_POST['passport'],
        $registration = $_POST['registration'],
        $drivers_license = $_POST['drivers_license'],
        $phone_1 = $_POST['phone_1'],
        $phone_2 = $_POST['phone_2'],
        $phone_3 = $_POST['phone_3']
      );

      $drivers->getEdit($id, $values);

      header("Location: /drivers/view/".$id);
      exit();
    } else {
      $drivers = new Drivers();
      $oneDriverName = $drivers->getOneSelect($id);

      include("views/drivers/driversFormEdit.php");
    }
  }

//-----------удаление-----------------//
  public function delete($id) {
    if ($id > 0) {
      $drivers = new Drivers();
      $drivers->deleteDriver($id);

      header("Location: /drivers");
      exit();
    } else {
      header("Location: /drivers");
      exit();
    }
  }

}
