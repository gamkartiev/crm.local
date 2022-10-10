<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();
  $allPrrMonth = $prr->getAllMonthSelect(); //месяцы в виде чисел
  $allPrrMonth = $prr->getStringFormatDate($allPrrMonth); //месяцы в виде строки

  //вызвать последний месяц, если id не назначено
  if(empty($id)){
    $id = $prr->getLastMonth();
  }

  $oneMonthPrr = $prr->getOneMonthPrr($id);

  $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
  $driversTest = $prr->getOneMonth($id, $numberOfDaysInMonth); //вызвать один месяц

  $drivers = $prr->getDriversSelect();

  include("views/prr/prr.php");
}


public function edit($id){
  if(!empty($_POST) && $id > 0){
    $prr = new Prr();

    $values = array();

    $prr->getEdit($id, $values);
  } else {
    $prr = new Prr();
    
    $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    include("views/prr/prrFormEdit.php");
  }

}


public function add() {
  if(!empty($_POST)){
    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $start = $_POST['start'],
      $the_end = $_POST['the_end']
    );

  $prr = new Prr();
  $prr->setOneMonthPrr($values);
  header("Location: /prr");
  } else {
      $prr = new Prr();
# тут поменять вместо последнего месяца на месяц по выбору
      $id = $prr-> getLastMonth();
      $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
      include("views/prr/prrForm.php");
  }
}


public function delete($id){
  if($id>0){
    $prr = new Prr();
    $prr->deleteEvent($id);

    header("Location: /prr/view");
    } else {
    header("Location: /prr/view");
  }
}


}
