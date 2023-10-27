<?php

class FinesController extends Controller
{
  public function view($id){
    $fines = new Fines();
    $allFines = $fines->getAllSelect();
    // $oneFine = $fines->getOneSelect($id); - можно удалить
// var_export($allFines);
    include("views/fines/fines.php");
  }


  public function add() {
    if(!empty($_POST)) {
    $fines = new Fines();

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $decree = $_POST['decree'],
      $date_of_violation = $_POST['date_of_violation'],
      $time_of_violation = $_POST['time_of_violation'],
      $id_cars = $_POST['id_cars'],
      $hold_date = $_POST['hold_date'],
      $withheld = $_POST['withheld'],
      $to_pay = $_POST['to_pay'],
      $due_date = $_POST['due_date'],
      $after_the_due_date = $_POST['after_the_due_date'],
      $date_of_application = $_POST['date_of_application'],
      $note = $_POST['note'],
      $status = $_POST['status']
    );

    $fines->getInsert($values);
    header("Location: /fines");
    } else {
      $fines = new Fines();
      $cars = $fines->getCarsSelect();
      $drivers = $fines->getDriversSelect();
      $status = $fines->getStatusSelect();
    // var_export($cars);
      include("views/fines/finesForm.php");
    }
  }


  public function edit($id) {
    if(!empty($_POST)&& $id > 0) {
      $fines = new Fines();

      $values = array(
        $id_drivers = $_POST['id_drivers'],
        $decree = $_POST['decree'],
        $date_of_violation = $_POST['date_of_violation'],
        $time_of_violation = $_POST['time_of_violation'],
        $id_cars = $_POST['id_cars'],
        $hold_date = $_POST['hold_date'],
        $withheld = $_POST['withheld'],
        $to_pay = $_POST['to_pay'],
        $due_date = $_POST['due_date'],
        $after_the_due_date = $_POST['after_the_due_date'],
        $date_of_application = $_POST['date_of_application'],
        $note = $_POST['note'],
        $id_status = $_POST['status']
      );

      $fines->getEdit($id, $values);
      header("Location: /fines");
    } else {
      $fines = new Fines();

      $oneFine = $fines->getOneSelect($id);
      $cars = $fines->getCarsSelect();
      $drivers = $fines->getDriversSelect();
      $status = $fines->getStatusSelect();
// var_export($oneFine);
      //Поставить при выводе сохраненные в бд
      //клиента, машину и водителя в списке формы первыми:
      $cars = $fines->getFirstItemCars($cars, $oneFine);
      $drivers = $fines->getFirstItemDrivers($drivers, $oneFine);
      $status = $fines->getFirsItemStatus($status, $oneFine);
// var_export($status);

      include ("views/fines/finesFormEdit.php");

    }
  }


  public function delete($id) {
  if ($id > 0) {
    $fines = new Fines();
    $fines->deleteFines($id);

    header("Location: /fines");
  } else {
    header("Location: /fines");
    }
  }

}
