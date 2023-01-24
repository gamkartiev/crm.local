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
$getLastMonthPrr = $prr->getLastMonthPrr($id); //список водителей из табл.бд prr_drivers
$listDriversWorked = $prr->getListDriversWorked($id, $numberOfDaysInMonth); //список водителей из табл.бд flights
// var_export($listDriversWorked);
// var_export($getLastMonthPrr;)
// var_export($numberOfDaysInMonth);
  include("views/prr/prr.php");
}



public function update($id){
  $prr = new Prr();

  $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
  // $listDriversWorked = $prr->getListDriversWorked($id, $numberOfDaysInMonth); //из табл flights
  // $getLastMonthPrr = $prr->getLastMonthPrr($id); //список водителей из табл.бд prr_drivers

  $listDriversWorked = array ("0"=>"Вершинников", "1"=>"Иванов", "2"=>'Бадиев' );
  $getLastMonthPrr = array("0" => array('drivers'=>'Акушеров'),
  												 "1"=>array('drivers'=>'Степанов'),
  												 "2"=>array('drivers'=>'Иванов'));

// var_export($listDriversWorked);
var_export($getLastMonthPrr);
  //Сравнение списка из flights со списком из prr_drivers
  $listComparison = $prr->getListComparison($listDriversWorked, $getLastMonthPrr);

var_export($listComparison);
  //сравнение и обновление списка водителей в ПРР в prr_drivers
  // $updatePrrTable = $prr->setUpdatePrrTable($listDriversWorked, $getLastMonthPrr);

  header("Location: /prr");
}



public function edit($id){
  if(!empty($_POST) && $id > 0){
    $prr = new Prr();
    $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    $getLastMonthPrr = $prr->getLastMonthPrr($id);

    //высчитываем сколько массивов должно быть ()водители с суточными)
    $removed = array_pop($_POST); //убираем button из вх-го массива на всякий случай

    //делим POST на столько элементов, сколько и водителей в этом месяце
    $value = array_chunk($_POST, $numberOfDaysInMonth, true);

    for ($i=0; $i < count($value); $i++) {
      $month_and_years = $id."-01"; // месяц работы водителя
      // выделяем drivers_id из первого ключа массива:
      $firstKey = array_key_first($value[$i]); //выбираем первый ключ
      $sharedKey = explode('_', $firstKey); //разделяем его по "_"
      $drivers_id = $sharedKey[0]; //выбираем drivers_id из разделенного

      //индексируем массив заново начиная с 1 до конечной даты месяца:
      $keys = range(1, $numberOfDaysInMonth);
      $values = array_combine($keys, $value[$i]);

      array_unshift($values, $month_and_years, $drivers_id); //объединяем в один массив

      $prr->getEdit($id, $numberOfDaysInMonth, $drivers_id, $values);
      header("Location: /prr/edit/$id");
    }
  } else {
    $prr = new Prr();

    $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    $getLastMonthPrr = $prr->getLastMonthPrr($id);

    include("views/prr/prrFormEdit.php");
  }
}


}
