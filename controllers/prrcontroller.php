<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();

  //<--- правая панель с месяцами
  $allPrrMonth = $prr->getAllMonthSelect(); //месяцы в виде строки
  // var_export($allPrrMonth);
  $allPrrMonth = $prr->getStringFormatDate($allPrrMonth); //месяцы в виде чисел
 // ---> правая панель с месяцами

 if(empty($id)){
   $id = $prr->getLastMonthDriversWork();
 }

 $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id); // кол-во дней в месяце
 $listDriversWorked = $prr->getListDriversWorked($id, $numberOfDaysInMonth); //список водителей из табл.бд flights
 $getLastMonthPrr = $prr->getLastMonthPrr($id, $listDriversWorked); //список водителей из табл.бд prr_drivers
var_export($listDriversWorked);

  include("views/prr/prr.php");
}



// public function update($id){
  //   $prr = new Prr();
  //
  //   $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    // $listDriversWorked = $prr->getListDriversWorked($id, $numberOfDaysInMonth); //из табл flights
    // $getLastMonthPrr = $prr->getLastMonthPrr($id); //список водителей из табл.бд prr_drivers
  // var_export($id);
  // var_export($listDriversWorked);
  // var_export($getLastMonthPrr);
    // Сравнение списка из flights со списком из prr_drivers
    // $listComparison = $prr->getListComparison($listDriversWorked, $getLastMonthPrr);
  //Нужно поменять flight столбец Drivers вместо ФИО водителей - ссылку на таблицу drivers
  // if(!empty($listComparison)){
  //   for ($i=0; $i < count($listComparison); $i++) {
  //     $month_and_years = $id."-01";
  //     $drivers = $listComparison[$i]['0'];
  //
  //     $values = array($month_and_years, $drivers);
  //
  //     if($listComparison[$i]['1'] == 'add'){
  //       $prr->setInsert($month_and_years, $values);
  //     } else{
  //       $id = $listComparison[$i]['2']; //это положение элемента с id строки в таблице ПРР
  //       $prr->setDelete($id);
  //     }
  //   }
  // }
  // // var_export($listComparison);
  //
  //   header("Location: /prr");
// }



public function edit($id){
  if(!empty($_POST) && $id > 0){
    $prr = new Prr();
    $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    $listDriversWorked = $prr->getListDriversWorked($id, $numberOfDaysInMonth); //список водителей из табл.бд flights
    $getLastMonthPrr = $prr->getLastMonthPrr($id, $listDriversWorked);

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
      header("Location: /prr/view/$id");
    }
  } else {
    $prr = new Prr();

    $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
    $listDriversWorked = $prr->getListDriversWorked($id, $numberOfDaysInMonth); //список водителей из табл.бд flights
    $getLastMonthPrr = $prr->getLastMonthPrr($id, $listDriversWorked);

    include("views/prr/prrFormEdit.php");
  }
}


}
