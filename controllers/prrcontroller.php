<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();
  $allPrrMonth = $prr->getAllMonthSelect();
  $allEvents = $prr->getAllEventsSelect();
  $oneMonth = $prr->getOneMonth($id);

  $dayPrr = $prr->getDailyDays($id, $oneMonth);
var_export($dayPrr);

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

//убираю пункт редактирования
// public function edit($id){
//   if($_POST)
// }

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
