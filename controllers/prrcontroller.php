<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  // echo "выходе есть всегда";
  $prr = new Prr();
  $allPrrMonth = $prr->getAllSelect();

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




}
