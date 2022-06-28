<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();
  $allPrrMonth = $prr->getAllMonthSelect(); //месяцы в виде чисел
  $allPrrMonth = $prr->getStringFormatDate($allPrrMonth); //месяцы в виде строки

// var_dump($id);

  $allEvents = $prr->getAllEventsSelect();
  $oneMonth = $prr->getOneMonth($id);
  // $gettype = gettype($id);
  // echo $gettype;

  $dayPrr = $prr->getDailyDays($id, $oneMonth);

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
