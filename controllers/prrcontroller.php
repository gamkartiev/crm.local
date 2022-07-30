<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();
  $allPrrMonth = $prr->getAllMonthSelect(); //месяцы в виде чисел
  $allPrrMonth = $prr->getStringFormatDate($allPrrMonth); //месяцы в виде строки


  $allEvents = $prr->getAllEventsSelect();


  //вызвать последний месяц, если id не назначено
  if(empty($id)){
    $id = $prr->getLastMonth();
  }
;
// var_dump($id);

  //количество дней в месяце
  $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
  $oneMonth = $prr->getOneMonth($id, $numberOfDaysInMonth); //вызвать один месяц
var_export($oneMonth);


  // $dayPrr = $prr->getDailyDays($id, $oneMonth);

  $drivers = $prr->getDriversSelect();

  include("views/prr/prr.php");



}


public function add() {
  if(!empty($_POST)){

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $event = $_POST['event'],
      $start = $_POST['start'],
      $the_end = $_POST['the_end']
    );

  $prr = new Prr();
  $prr->getInsert($values);
  header("Location: /prr");
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
