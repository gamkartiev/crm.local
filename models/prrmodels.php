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

  public function getLastMonth(){
    $result = date("Y-m");

    return $result;
  }

  //функция количество дней в месяце (для таблицы ПРР)
   public function numberOfDaysInMonth($id){
    $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
    $getOnlyYear = (int)$getOnlyYear = substr($id, 0);

    //количество рабочих дней в месяце.
    $result = cal_days_in_month(CAL_GREGORIAN, $getOnlyMonth, $getOnlyYear);

    return $result;
   }

//функция на удаление//
//выдает все данные по одному выделенному месяцу
  public function getOneMonth($id, $numberOfDaysInMonth) {
    $table = 'flights';
    $rows = 'id, date_1, date_2, driver';
    $join =	'';
    //запрос включает: те рейсы, что загружались в прошлом месяце и выгружались в запрашиваемом месяцев
    // а также, те рейсы, что загружались в этом месяце и выгружались в запрашиваемом
    $where = 'date_2 >= '.'"'."$id-01".'"'." AND " .'date_2 <='.'"'.$id.'-'."$numberOfDaysInMonth".'"';
    $order = 'driver ASC, date_1 ASC';

    $base = new Base();
    $result_1 = $base->select($table, $rows, $join, $where, $order);

    //--- эта вставка, чтобы выбрать месяц следующий за запрашиваемом ---//
    $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
    $getOnlyYear = (int)$getOnlyYear = substr($id, 0, 4);
    $getOnlyMonth = $getOnlyMonth+1;
    if($getOnlyMonth <= 10){
      $getOnlyMonth = '0'.$getOnlyMonth;
    }
    // var_dump($getOnlyMonth);
    // var_dump($getOnlyMonth);
    $date = $getOnlyYear.'-'.$getOnlyMonth;
    // var_dump($date);
    //--- тут уже сформировалась дата со следующим месяцем ---//

    //запрос включает те рейсы, что начинались в запрашиваемом, а выгружались в следующем месяце
    $where = 'date_1 < '.'"'."$date-01".'"'." AND " .'date_2 >= '.'"'."$date-01".'"';
    $base = new Base();
    $result_2 = $base->select($table, $rows, $join, $where, $order);

    $result = array_merge($result_1, $result_2);

//получить уникальный список водителей за этот месяц
    $prrMonth = array();
    for ($i=0; $i < count($result); $i++) {
      $prrMonth[] = $result[$i]['driver'];
    }
    $result = array_unique($prrMonth);
    $result = array_values($result);

    return $result;
 }


// public function getTestSelectDrivers(){
//   $result = array("Кочерыжкин", "Иванов", "Алексеев");
//
//   return $result;
// }
//
// public function getPrrMonth($id,$numberOfDaysInMonth) {
//   $oneMonth -> $this getOneMonth($id, $numberOfDaysInMonth)
//   //получить уникальный список водителей, что вообще работал в тот месяц
//   $prrMonth = array();
//   for ($i=0; $i < count($oneMonth); $i++) {
//     $prrMonth[] = $oneMonth[$i]['driver'];
//   }
//   $result = array_unique($prrMonth);
//   $result = array_values($result);
//
// return $result;
// }


//**************
//--------------------------------------------------///
  public function getOneMonthPrr() {
    $table = 'prr';
    $rows = 'prr.id as id, id_drivers, start, the_end,
              drivers.id as drivers_id, drivers.driver';
    $join =	' LEFT JOIN drivers ON id_drivers = drivers.id';
    $where = '';
    $order = 'the_end DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }
//*****************

//**************
  //добаление нового события (например, выходного для водителя)
  public function setOneMonthPrr($values){
    $table = 'prr';
    $rows = 'id_drivers, start, the_end';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }
//**************

//**************
  public function getDriversSelect() {
  	$table = 'drivers';
  	$rows = 'id, driver';
  	$join = '';
  	$where = '';
  	$order = 'driver DESC';

  	$base = new Base();
  	$result = $base->select($table, $rows, $join, $where, $order);

  	return $result;
  }
//**********

//*************
  public function deleteEvent($id){
    $table = 'working_days_drivers';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }
//**************
}
