<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();

  //<--- правая панель с месяцами
  $allPrrMonth = $prr->getAllMonthSelect(); //месяцы в виде чисел
  $allPrrMonth = $prr->getStringFormatDate($allPrrMonth); //месяцы в виде строки
 // ---> правая панель с месяцами

 if(empty($id)){
   $id = $prr->getLastMonthDriversWork();
 }
 // var_export($id);
 $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
$getLastMonthPrr = $prr->getLastMonthPrr($id);
var_export($getLastMonthPrr);
// var_export($numberOfDaysInMonth);
  include("views/prr/prr.php");
}


public function update(){
  $prr = new Prr();

  //список месяцев, в котором вообще работали:
  $uniqueValuesMonth = getUniqueValuesMonth();
  //сипок месяцев и водителей в каждом месяце, в котором работали:
  !!!!!$listDriversFromFlights = $prr->listDriversFromFlights($uniqueValuesMonth);
  $listDriversFromPrr = $prr->listDriversFromPrr();

  $listComparison = $prr->getListComparison($listDriversFromFlights, $listDriversFromPrr);
  $updatePrrTable = $prr->setListComparison($listComparison);
include("views/prr/prr.php");
  # 1. Берем список из месяц-водители, что работали в этот месяц за все время
  #    из flights. Список водителей приводим к уникальным значениям (список_1)
  # 2. Берем список из месяц-водители, что есть в prr_drivers (он вроде и также
  #    уникальный) (список_2)
  # 3. Сравниваем каждый месяц из списка_1 со списком_2:
  #      -если месяц из списка_1 отсутствует в списке_2, то добавить и месяц и
  #       водители из этого месяца
  #      -если месяц есть, но отсутствует какой-либо водитель, то добавить
  # 4. Вывести последний месяц из prr_drivers
}

public function edit($id){
  if(!empty($_POST) && $id > 0){
    $prr = new Prr();

    $values = array();

    $prr->getEdit($id, $values);
  } else {
    $prr = new Prr();

    $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    $getLastMonthPrr = $prr->getLastMonthPrr($id);
   // var_export($getLastMonthPrr);

    include("views/prr/prrFormEdit.php");
  }
}


// public function add() {
//   if(!empty($_POST)){
//     $values = array(
//       $id_drivers = $_POST['id_drivers'],
//       $start = $_POST['start'],
//       $the_end = $_POST['the_end']
//     );
//
//   $prr = new Prr();
//   $prr->setOneMonthPrr($values);
//   header("Location: /prr");
//   } else {
//       $prr = new Prr();
// # тут поменять вместо последнего месяца на месяц по выбору
//       $id = $prr-> getLastMonth();
//       $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
//       include("views/prr/prrForm.php");
//   }
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
