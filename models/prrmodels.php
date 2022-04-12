<?php

class Prr extends Base
{


//---------------------------------------------//
//функция getAllSalaryMonthSelect дублируется с такой же в salaryMoodels
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

  public function getOneMonth($id) {
    $getOnlyMonth = substr($id, 0, 3);
    $getOnlyYear = substr($id, -4);
    $getUnixTimestamp = strtotime($getOnlyMonth);

    $getNormalFormatMonth = date('m', $getUnixTimestamp); //переводим метку времени в цифру месяца

    // объединяем месяц и год и получаем время в формате unix (метка времени)
    $getStartMonthUnixTimestamp = strtotime ($getOnlyYear . "-" . $getNormalFormatMonth . "-" . "01");
    $getEndMonthUnixTimestamp = strtotime ($getOnlyYear . "-" . $getNormalFormatMonth . "-" . "31");

    //получаем нужный формат месяца, как 01, так и 31 числа
    $getNormalFormatStartMonth = date('Y-m-d', $getStartMonthUnixTimestamp);
    $getNormalFormatEndMonth = date('Y-m-d', $getEndMonthUnixTimestamp);

    $table = 'flights';
    $rows = 'id, date_1, date_2, driver';
    $join =	'';
    $where = 'date_2 >= '.'"'."$getNormalFormatStartMonth".'"'." AND " .'date_2 <='.'"'.$getNormalFormatEndMonth.'"';
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
 }


 public function getDailyDays($id, $oneMonth){
   //узнаем год и месяц из этого id
   $month = substr($id, 0, 3);
   $year = substr($id, -4);

   $numberOfDaysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));
   $dayPrr = array();

   // for ($i=0; $i < $numberOfDaysInMonth); $i++) {
   //   if(date(y-m-$i))
   // }
   // if(driver worked){
   //   $dailyAllowanceThisDay = getSqlInDailyAllowance();
   //   $dayPrr
   // }

   return $dayPrr;
 }


  public function getAllSelect() {
    $table = 'flights';
    $rows = 'id, date_1, date_2, driver';
    $join =	'';
    $where = '';
    $order = 'driver, date_1';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }

//--------------------------------------------------///





  public function getAlleventsSelect() {
    $table = 'working_days_drivers';
    $rows = 'working_days_drivers.id as id, id_drivers,
            event, start, the_end, drivers.id as drivers_id, drivers.driver';
    $join =	' LEFT JOIN drivers ON id_drivers = drivers.id';
    $where = '';
    $order = 'the_end DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }

  //добаление нового события (например, выходного для водителя)
  public function getInsert($values){
    $table = 'working_days_drivers';
    $rows = 'id_drivers, event, start, the_end';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }

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


  public function deleteEvent($id){
    $table = 'working_days_drivers';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }

}


 ?>
