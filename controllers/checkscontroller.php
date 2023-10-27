<?php

class ChecksController extends Controller
{
public function view($id){
      $checks = new Checks();
      $allChecks = $checks->getAllSelect();
      // $oneCheck = $checks->getOneSelect($id);
var_export($allChecks);
      // $oneCheck = $checks->getOneSelect($id);
      include("views/checks/checks.php");
}


public function add() {
    if(!empty($_POST)) {
    $checks = new Checks();

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $sum = $_POST['sum'],
      $date = $_POST['date'],
      $note = $_POST['note'],
      $id_status = $_POST['id_status'],
      $availability_of_a_check = $_POST['availability_of_a_check'],
    );

    $checks->getInsert($values);
    header("Location: /checks");
    } else {
      $checks = new Checks();
      $drivers = $checks->getDriversSelect();
      $status = $checks->getStatusSelect();
      $status_of_a_check = $checks->getStatusOfACheck();

      include("views/checks/checksForm.php");
    }
}


public function edit($id) {
  if(!empty($_POST)&& $id > 0) {
    $checks = new Checks();

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $sum = $_POST['sum'],
      $date = $_POST['date'],
      $note = $_POST['note'],
      $id_status = $_POST['id_status'],
      $availability_of_a_check = $_POST['availability_of_a_check'],
    );

      $checks->getEdit($id, $values);
      header("Location: /checks");
    } else {
      $checks = new Checks();

      $oneCheck = $checks->getOneSelect($id);
      $drivers = $checks->getDriversSelect();
      $status = $checks->getStatusSelect();
      $status_of_a_check = $checks->getStatusOfACheck();
    // var_export($oneCheck);
    $u = count($status_of_a_check);
    var_export($u);
    var_export($status_of_a_check);
      //Поставить при выводе сохраненные в бд
      //клиента, машину и водителя в списке формы первыми:

      $drivers = $checks->getFirstItemDrivers($drivers, $oneCheck);
      $status = $checks->getFirsItemStatus($status, $oneCheck);
      $status_of_a_check = $checks->getFirsItemStatusChecks($status_of_a_check, $oneCheck);


      include ("views/checks/checksFormEdit.php");

    }
}


public function delete($id) {
  if ($id > 0) {
    $checks = new Checks();
    $checks->deleteChecks($id);

    header("Location: /checks");
   } else {
    header("Location: /checks");
    }
}

}
