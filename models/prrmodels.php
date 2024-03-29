<?php

class Prr extends Base
{
//---------------------------------------------//
//функция getAllSalaryMonthSelect дублируется с такой же в salaryMoodels
//Это правая боковая панель с месяцами и годами, которые ездили ТС
  public function getAllMonthSelect() {
    $table = 'flights';
    $rows = 'date_2';
    $join =	'';
    $where = '';
    $order = 'date_2 DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    //Получить весь список месяцев
    for ($i=0; $i < count($result); $i++) {
        $res[] = $result[$i]['date_2'];
    }

    //разделить этот список по месяцам и годам, убрав даты
    for($i=0; $i < count($res); $i++) {
      $res[$i] = date('M Y', strtotime($res[$i]));
    }

    //убираем повторяющиеся данные в массиве и обновляем список ключей
    $res = array_unique($res);
    $result = array_values($res);

    return $result;
  }




//функция, что должна вызываться в контроллере и
//что должна конвертировать числовой формат даты в текстовый
//для боковой панели страницы
  public function getStringFormatDate($allPrrMonth){
    for($i=0; $i < count($allPrrMonth); $i++) {
      $res[$i] = date('Y-m', strtotime($allPrrMonth[$i]));
      $result[$i] = [$res[$i], $allPrrMonth[$i]];
    }

    return $result;
  }

  public function getTheDateOfTheLastMonth(){
    $result = date("Y-m");
    return $result;
  }



// последний месяц, где работали водители
  public function getLastMonthDriversWork(){
    $table = 'prr_drivers';
    $rows = 'month_and_years';
    $join =	'';
    //запрос включает: те рейсы, что загружались в прошлом месяце и выгружались в запрашиваемом месяцев
    // а также, те рейсы, что загружались в этом месяце и выгружались в запрашиваемом
    $where = '';
    $order = 'month_and_years DESC limit 1';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    $result = $result[0]['month_and_years'];
    $result = substr($result, 0, 7); //убираем день месяца

    return $result;
  }



  //возвращает количество дней в месяце (для таблицы ПРР)
   public function numberOfDaysInMonth($id){
    $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
    $getOnlyYear = (int)$getOnlyYear = substr($id, 0);

    //количество рабочих дней в месяце.
    $result = cal_days_in_month(CAL_GREGORIAN, $getOnlyMonth, $getOnlyYear);

    return $result;
   }


//************* относится к function update($id) **************//
//список водителей, что работали в этот месяц. Название изменено с getLastMonthData
  public function getListDriversWorked($id, $numberOfDaysInMonth) {
// !!! - в этой функции можно испольщовать SELECT DISTINCT поле FROM имя_таблицы WHERE условие
// чтобы убрать приведение полученных данных к уникальному значению - попробовать позже
    $table = 'flights';
    $rows = 'flights.id, flights.date_1, flights.date_2, flights.id_drivers, drivers.driver AS driver';
    $join =	' LEFT JOIN drivers ON flights.id_drivers = drivers.id';
    //запрос включает: те рейсы, что загружались в прошлом месяце и выгружались в запрашиваемом месяцев
    // а также, те рейсы, что загружались в этом месяце и выгружались в запрашиваемом
    $where = 'date_2 >= '.'"'."$id-01".'"'." AND " .'date_2 <='.'"'.$id.'-'."$numberOfDaysInMonth".'"';
    $order = 'drivers.driver ASC, date_1 ASC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);
// var_dump($result_1);
    //--- эта вставка, чтобы выбрать месяц следующий за запрашиваемом ---//
    $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
    $getOnlyYear = (int)$getOnlyYear = substr($id, 0, 4);
    $getOnlyMonth = $getOnlyMonth+1;
    if($getOnlyMonth <= 10){
      $getOnlyMonth = '0'.$getOnlyMonth;
    }

    $date = $getOnlyYear.'-'.$getOnlyMonth;
    //--- все водители, что хоть как-то работали в этом месяце (грузились или выгружались ) - учитываются
    //запрос включает те рейсы, что начинались в запрашиваемом, а выгружались в следующем месяце
    $where = 'date_1 < '.'"'."$date-01".'"'." AND " .'date_2 >= '.'"'."$date-01".'"';
    $base = new Base();
    $result_1 = $base->select($table, $rows, $join, $where, $order);
    // var_export($result_1);

    if(!empty($result_1)){
      $result = array_merge($result, $result_1);
    }

    // var_export($result);
    //получить уникальный список водителей за этот месяц
    $prrMonth = array();
    for ($i=0; $i < count($result); $i++) {
      $prrMonth[] = $result[$i]['id_drivers'];
    }
    $result = array_unique($prrMonth);
    $result = array_values($result);
//возврщает id водителей, что работали в этом месяце по информации таблицы flights
    // var_export($result);

    return $result;
 }
//************* относится к function update($id) **************//



  public function getLastMonthPrr($id, $listDriversWorked){
    $table = 'prr_drivers';
    $rows = 'prr_drivers.id AS prr_drivers_id,
              prr_drivers.drivers AS id_drivers,
              prr_drivers.month_and_years,
              prr_drivers.1, prr_drivers.2, prr_drivers.3, prr_drivers.4, prr_drivers.5,
              prr_drivers.6, prr_drivers.7, prr_drivers.8, prr_drivers.9, prr_drivers.10,
              prr_drivers.11, prr_drivers.12, prr_drivers.13, prr_drivers.14, prr_drivers.15,
              prr_drivers.16, prr_drivers.17, prr_drivers.18, prr_drivers.19, prr_drivers.20,
              prr_drivers.21, prr_drivers.22, prr_drivers.23, prr_drivers.24, prr_drivers.25,
              prr_drivers.26, prr_drivers.27, prr_drivers.28, prr_drivers.29, prr_drivers.30,
              prr_drivers.31,
              drivers.id, drivers.driver AS drivers';
    $join =	' INNER JOIN drivers ON prr_drivers.drivers = drivers.id';
    $order = '';

    for ($i=0; $i < count($listDriversWorked); $i++) {
      $where = 'month_and_years ='.'"'.$id.'-01'.'"'. " AND ".'prr_drivers.drivers ='.$listDriversWorked[$i];
      $base = new Base();
      $result_1 = $base->select($table, $rows, $join, $where, $order);

      if(empty($result_1)){
        $values = array(
          $month_and_years = $id.'-01',
          $drivers = $listDriversWorked[$i],
        );
        $rows_2 = 'month_and_years, drivers';

        $result_2 = $base->insert($table, $values, $rows_2);
        $result_1 = $base->select($table, $rows, $join, $where, $order);
      }

      $result[$i] = $result_1['0'];
    }
    return $result;
  }


//************* относится к function update($id) **************//
//Сравнение списка из flights со списком из prr_drivers
//   public function getListComparison($, $getLastMonthPrr){
//     // 1. сравниваем список $listDriversWorked со списком $getLastMonthPrr
//     //  если элемент $i из $listDriversWorked не сравнивается ни с одним эл-м из $getLastMonthPr,
//     //  то добавляем этот элемент, как массив в новый массив $result со вторым значием массива - add.
//     //  Если этого элемента нет в списке $listDriversWorked, но есть в списке $getLastMonthPrr,
//     //  то добавляем его как новый массив, со вторым значением массива - delete
//     for ($i=0; $i < count($listDriversWorked); $i++) {
//       for ($k=0; $k < count($getLastMonthPrr); $k++) {
//         if ($listDriversWorked[$i] == $getLastMonthPrr[$k]['drivers']) {
//           $task_1[$i] = $listDriversWorked[$i]; //если в ПРР есть этот водитель, то отмечаем
//         }
//       }
//       if(empty($task_1[$i])){ //если в ПРР нет этого водителя, то ставим на добавление в ПРР
//         $result[$i] = array("0"=>$listDriversWorked[$i], "1"=>"add");
//       }
//     }
//
//     for ($i=0; $i < count($getLastMonthPrr); $i++) {
//       for ($k=0; $k < count($listDriversWorked); $k++) {
//         if ($getLastMonthPrr[$i]['drivers'] == $listDriversWorked[$k]) {
//           $task_2[$i] = $getLastMonthPrr[$i]['drivers'];  //если водитель есть в ПРР и нет в рейсах, то добавляем в массив task
//         }
//       }
//
//       if(empty($task_2[$i])){  //всех водителей, что есть массиве task - ставим на удаление (те, что нет среди работавших)
//         $result_2[$i] = array("0"=>$getLastMonthPrr[$i]['drivers'], "1"=>"delete", "2"=>$getLastMonthPrr[$i]['prr_drivers_id']);
//       }
//       // var_export($result_2);
//     }
//     if(!empty($result_2)){
//       $result = array_merge($result_1, $result_2);
//     }
//
//     var_export($result);
//
//   return $result;
// }

//************** ***************//

  public function setInsert($month_and_years, $values) {
    $table = 'prr_drivers';
    // $values = ; соответствующий массив передается из контроллера
    $rows = 'month_and_years, drivers';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }

  public function setDelete($id){
    $table = 'prr_drivers';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }


//обновление списка ПРР в prr_drivers
  // public function setUpdatePrrTable($id, $listComparison){
  //
  //   $month_and_years = $id."-01";
  //   $table = 'prr_drivers';
  //
  //   for ($i=0; $i < count($listComparison); $i++) {
  //     if($listComparison[$i]['1'] == 'add'){
  //       $rows = "date";
  //     }
  //
  //   }
  //
  //   $table = 'prr_drivers';
  //   $rows =
  //   $where = 'drivers='.(int)$drivers_id;
  //
  //   $base = new Base();
  //   $base->update($table, $rows, $where, $values);
  // }
##############################################################



//***********
 public function getEdit($id, $numberOfDaysInMonth, $drivers_id, $values, $month_and_years){
   $table = 'prr_drivers';

   if($numberOfDaysInMonth >= 31){
     $rows = array("`month_and_years`", "`drivers`", "`1`", "`2`", "`3`", "`4`", "`5`", "`6`",
     "`7`", "`8`", "`9`", "`10`", "`11`", "`12`", "`13`", "`14`", "`15`", "`16`", "`17`", "`18`", "`19`",
     "`20`", "`21`", "`22`", "`23`", "`24`", "`25`", "`26`", "`27`", "`28`", "`29`", "`30`", "`31`");
   }
   if ($numberOfDaysInMonth >= 30 AND $numberOfDaysInMonth < 31) {
     $rows = array("`month_and_years`", "`drivers`", "`1`", "`2`", "`3`", "`4`", "`5`", "`6`",
     "`7`", "`8`", "`9`", "`10`", "`11`", "`12`", "`13`", "`14`", "`15`", "`16`", "`17`", "`18`", "`19`",
     "`20`", "`21`", "`22`", "`23`", "`24`", "`25`", "`26`", "`27`", "`28`", "`29`", "`30`");
   }
   if ($numberOfDaysInMonth >= 28 AND $numberOfDaysInMonth < 29){
     $rows = array("`month_and_years`", "`drivers`", "`1`", "`2`", "`3`", "`4`", "`5`", "`6`",
     "`7`", "`8`", "`9`", "`10`", "`11`", "`12`", "`13`", "`14`", "`15`", "`16`", "`17`", "`18`", "`19`",
     "`20`", "`21`", "`22`", "`23`", "`24`", "`25`", "`26`", "`27`", "`28`");
   }
   if ($numberOfDaysInMonth >= 29 AND $numberOfDaysInMonth < 30){
     $rows = array("`month_and_years`", "`drivers`", "`1`", "`2`", "`3`", "`4`", "`5`", "`6`",
     "`7`", "`8`", "`9`", "`10`", "`11`", "`12`", "`13`", "`14`", "`15`", "`16`", "`17`", "`18`", "`19`",
     "`20`", "`21`", "`22`", "`23`", "`24`", "`25`", "`26`", "`27`", "`28`", "`29`");
   }

   $where = 'drivers='.(int)$drivers_id . " AND " . ' month_and_years='. "'" .$month_and_years. "'";

   $base = new Base();
   $base->update($table, $rows, $where, $values);
 }
//***********

//*************
  public function deleteEvent($id){
    $table = 'working_days_drivers';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }
//**************
}
