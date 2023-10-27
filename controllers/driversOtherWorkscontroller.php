<?php

class DriversOtherWorksController extends Controller
{
  public function view($id){

    $driversOtherWorks = new driversOtherWorks();
    $allSelect = $driversOtherWorks->getAllSelect($id);

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
      // $allSelect = $driversOtherWorks->getAllSelect($id); можно удалить вроде
      $drivers = $driversOtherWorks->getDriversSelect();
      $status = $driversOtherWorks->getStatusSelect();
  //   // var_export($cars);
      include("views/driversOtherWorks/driversOtherWorksForm.php");
    }
  }



// - в форме редактирования первым ставить тот статус, который сейчас актуален, т.е.
// если было не оплачено, то в выпадающем списке первым должно стоять "не оплачено" и т.д.
  public function edit($id) {
    if(!empty($_POST)&& $id > 0) {
      $driversOtherWorks = new driversOtherWorks();

      $values = array(
        $id_drivers = $_POST['id_drivers'],
        $sum = $_POST['sum'],
        $date_of_work = $_POST['date_of_work'],
        $id_status = $_POST['status'],
        $note = $_POST['note']
      );

      $driversOtherWorks->getEdit($id, $values);
      header("Location: /salary");
    } else {
      $driversOtherWorks = new driversOtherWorks();
      $oneSelect = $driversOtherWorks->getOneSelect($id);
// var_export($oneSelect);
      $drivers = $driversOtherWorks->getDriversSelect();
      $status = $driversOtherWorks->getStatusSelect();

      //Поставить при выводе сохраненные в бд
      //клиента, машину и водителя в списке формы первыми:
      // $cars = $driversOtherWorks->getFirstItemCars($cars, $oneFine);
      $drivers = $driversOtherWorks->getFirstItemDrivers($drivers, $oneSelect);
      // var_export($drivers);
      $status = $driversOtherWorks->getFirsItemStatus($status, $oneSelect);
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
