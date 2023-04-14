<?php

class FinesController extends Controller
{
  public function view($id){
    $driversOtherWorks = new driversOtherWorks();
    $allFines = $driversOtherWorks->getAllSelect();
    $oneFine = $driversOtherWorks->getOneSelect($id);
// var_export($allFines);
    require("views/driversOtherWorks/driversOtherWorks.php");
  }


  public function add() {
    if(!empty($_POST)) {
    $driversOtherWorks = new driversOtherWorks();

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $Sum = $_POST['sum'],
      $date_of_work = $_POST['date_of_work'],
      $status = $_POST['status'],
      $note = $_POST['note']
    );

    $driversOtherWorks->getInsert($values);
    header("Location: /driversOtherWorks");
    } else {
      $driversOtherWorks = new driversOtherWorks();
  // !    $cars = $driversOtherWorks->getCarsSelect();
  // !    $drivers = $driversOtherWorks->getDriversSelect();
  // !    $status = $driversOtherWorks->getStatusSelect();
  //   // var_export($cars);
      include("views/driversOtherWorks/driversOtherWorksForm.php");
    }
  }


  public function edit($id) {
    if(!empty($_POST)&& $id > 0) {
      $driversOtherWorks = new driversOtherWorks();

      $values = array(
        $id_drivers = $_POST['id_drivers'],
        $Sum = $_POST['sum'],
        $date_of_work = $_POST['date_of_work'],
        $status = $_POST['status'],
        $note = $_POST['note']
      );

      $driversOtherWorks->getEdit($id, $values);
      header("Location: /driversOtherWorks");
    } else {
      $driversOtherWorks = new driversOtherWorks();

      // $oneFine = $driversOtherWorks->getOneSelect($id);
      // $cars = $driversOtherWorks->getCarsSelect();
      $drivers = $driversOtherWorks->getDriversSelect();
      $status = $driversOtherWorks->getStatusSelect();

      //Поставить при выводе сохраненные в бд
      //клиента, машину и водителя в списке формы первыми:
      // $cars = $driversOtherWorks->getFirstItemCars($cars, $oneFine);
      // $drivers = $driversOtherWorks->getFirstItemDrivers($drivers, $oneFine);
      // $status = $driversOtherWorks->getFirsItemStatus($status, $oneFine);
// var_export($status);

      include ("views/driversOtherWorks/driversOtherWorksFormEdit.php");

    }
  }


  public function delete($id) {
  if ($id > 0) {
    $driversOtherWorks = new driversOtherWorks();
    $driversOtherWorks->deleteDriversOtherWorks($id);

    header("Location: /driversOtherWorks");
  } else {
    header("Location: /driversOtherWorks");
    }
  }

}
