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

//список водителей, что работали в этот месяц
  public function getLastMonthData($id, $numberOfDaysInMonth) {
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

    $date = $getOnlyYear.'-'.$getOnlyMonth;
    //--- тут уже сформировалась дата со следующим месяцем ---//

    //запрос включает те рейсы, что начинались в запрашиваемом, а выгружались в следующем месяце
    $where = 'date_1 < '.'"'."$date-01".'"'." AND " .'date_2 >= '.'"'."$date-01".'"';
    $base = new Base();
    $result_2 = $base->select($table, $rows, $join, $where, $order);

    $result = array_merge($result_1, $result_2);
    // var_export($result);
    //получить уникальный список водителей за этот месяц
    $prrMonth = array();
    for ($i=0; $i < count($result); $i++) {
      $prrMonth[] = $result[$i]['driver'];
    }
    $result = array_unique($prrMonth);
    $result = array_values($result);

    var_export($result);

    return $result;
 }


  public function getLastMonthPrr($id){
    $table = 'prr_drivers';
    $rows = 'drivers.driver AS drivers, prr_drivers.id, prr_drivers.month_and_years,
              prr_drivers.1,prr_drivers.2,prr_drivers.3,prr_drivers.4,prr_drivers.5,
              prr_drivers.6,prr_drivers.7,prr_drivers.8,prr_drivers.9,prr_drivers.10,
              prr_drivers.11,prr_drivers.12,prr_drivers.13,prr_drivers.14,prr_drivers.15,
              prr_drivers.16,prr_drivers.17,prr_drivers.18,prr_drivers.19,prr_drivers.20,
              prr_drivers.21,prr_drivers.22,prr_drivers.23,prr_drivers.24,prr_drivers.25,
              prr_drivers.26,prr_drivers.27,prr_drivers.28,prr_drivers.29,prr_drivers.30,prr_drivers.31,
              drivers.id';
    $join =	' INNER JOIN drivers ON prr_drivers.drivers = drivers.id';
    $where = 'month_and_years ='.'"'.$id.'-01'.'"';
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }


//**************
//--------------------------------------------------///
  // public function getOneMonthPrr() {
  //   $table = 'prr';
  //   $rows = 'prr.id as id, id_drivers, start, the_end,
  //             drivers.id as drivers_id, drivers.driver';
  //   $join =	' LEFT JOIN drivers ON id_drivers = drivers.id';
  //   $where = '';
  //   $order = 'the_end DESC';
  //
  //   $base = new Base();
  //   $result = $base->select($table, $rows, $join, $where, $order);
  //
  //   return $result;
  // }
//*****************

####################### update ###############################
public function getUniqueValuesMonth(){
  # 1. Какие месяцы вообще были - запрос
  # 2. В каждом месяце какие водители через функцию getLastMonthData

  $table = 'flights';
  $rows = 'date_1, date_2';
  $join =	'';
  $where = '';
  $order = 'date_1, date_2 ASC';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  # сравнить как date_1 с date_1, date_2 c date_2, date_1 с date_2 - не сделал
  # //сравнил date_1 с date_2//
  # и получить уникальные значения месяцам

  $uniqueValuesMonth = array();
  for ($i=0; $i < count($result); $i++) {
      $date_1 = $result[$i]['date_1'];
      $date_2 = $result[$i]['date_2'];
        $date_1 = substr($date_1, 0, 7); //убираем дни из месяца
        $date_2 = substr($date_2, 0, 7); //убираем дни из месяца
      $uniqueValuesMonth[] = $date_1;

      if ($date_1 != $date_2) {
        $uniqueValuesMonth[] = $date_2;
      }
  }
  $result = array_unique($uniqueValuesMonth);
  $result = array_values($result);

  // var_export($result);
  return $result;
}



//Тут надо делать полноценный запрос, с датой и водителями, что в эти даты работали
public function listDriversFromPrr($uniqueValuesMonth){
  for ($i=0; $i < count($uniqueValuesMonth); $i++) {
    // $id = $uniqueValuesMonth[$i];
    $numberOfDaysInMonth = $this->numberOfDaysInMonth($uniqueValuesMonth[$i]);
    $getMonthWork = $this-> getLastMonthData($uniqueValuesMonth[$i], $numberOfDaysInMonth);
  }

}



public function getListComparison($listDriversFromFlights, $listDriversFromPrr){}



public function setListComparison($listComparison){}
##############################################################




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
