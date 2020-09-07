<?php

/* ------------------- */
class DriversController extends Controller
{
  public function view($id) {
    // $id = $_GET['id'] ?? 1; //убрать тут единицу и поставить функцию вывода последнего добавленного

    $drivers = new Drivers();
    $allDriversName = $drivers->getAllSelect();
    $oneDriversName = $drivers->getOneSelect($id);

    include("views/drivers/drivers.php");
  }

  public function add() {
      if (!empty($_POST)) {
        $drivers = new Drivers();

        $values = array(
          $surname = $_POST['surname'],
          $first_name = $_POST['first_name'],
          $patronymic = $_POST['patronymic']
        );

        $drivers->getInsert($values);

        header("Location: /");
      } else {
          include("views/drivers/driversForm.php");
      }
    }

public function edit() {}
}
