<?php

class Salary extends Base
{

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


//возвращает количество дней в месяце (для таблицы ПРР)
 public function numberOfDaysInMonth($id){
  $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
  $getOnlyYear = (int)$getOnlyYear = substr($id, 0);

  //количество рабочих дней в месяце.
  $result = cal_days_in_month(CAL_GREGORIAN, $getOnlyMonth, $getOnlyYear);

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


public function getOneMonth($id, $numberOfDaysInMonth) {
  $table = 'flights';
  $rows = 'flights.id, flights.date_2, flights.id_drivers, SUM(flights.drivers_payment) AS cost, drivers.driver';
  $join =	' LEFT OUTER JOIN drivers ON flights.id_drivers = drivers.id';
  $where = 'date_2 >= '. '"'."$id-01".'"' ." AND " . 'date_2 <='. '"'."$id".'-'.
            "$numberOfDaysInMonth".'"'.' GROUP BY drivers.driver';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
// var_export($result);

  return $result;
  }


//--------------- ПРР -----------------//
public function getPrr($id, $numberOfDaysInMonth){
  $table = 'prr_drivers';
  $rows = 'prr_drivers.drivers AS id_drivers,
            prr_drivers.month_and_years,
            (prr_drivers.1 + prr_drivers.2 + prr_drivers.3 + prr_drivers.4 + prr_drivers.5 +
            prr_drivers.6 + prr_drivers.7 + prr_drivers.8 + prr_drivers.9 + prr_drivers.10 +
            prr_drivers.11 + prr_drivers.12 + prr_drivers.13 + prr_drivers.14 + prr_drivers.15 +
            prr_drivers.16 + prr_drivers.17 + prr_drivers.18 + prr_drivers.19 + prr_drivers.20 +
            prr_drivers.21 + prr_drivers.22 + prr_drivers.23 + prr_drivers.24 + prr_drivers.25 +
            prr_drivers.26 + prr_drivers.27 + prr_drivers.28 + prr_drivers.29 + prr_drivers.30 +
            prr_drivers.31) AS prr,
            drivers.driver';
  $join =	' INNER JOIN drivers ON prr_drivers.drivers = drivers.id';
  $where = ' month_and_years = '.'"'."$id-01".'"'.' GROUP BY driver, month_and_years';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}

public function getMonthWithPrr($prr, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['prr' => '0'];
    for ($j=0; $j < count($prr); $j++) {
        if($oneMonth[$i]['id_drivers'] == $prr[$j]['id_drivers']){
          $oneMonth[$i]['prr'] += $prr[$j]['prr'];
          }
       }
      }
  // var_export($oneMonth);

  return $oneMonth;
}
//--------------- End ПРР -----------------//



//-------------------- Премия ----------------------//
public function getPremium(){
  $table = 'drivers_premium';
  $rows = '*';
  $join =	'';
  $where = '';
  $order = 'id DESC LIMIT 1';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
  return $result;
}

//Учет премии, если она водителям должна начисляться
public function getMonthWithPremium($premium, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    if($oneMonth[$i]['cost'] > $premium[0]['total_premium']){
        $oneMonth[$i]['percent'] = $premium[0]['premium'];
        $oneMonth[$i]['cost_and_percent'] = $oneMonth[$i]['cost'] + (($oneMonth[$i]['cost'] * $premium[0]['premium'])/100);
      }else{
        $oneMonth[$i]['percent'] = 0;
        $oneMonth[$i]['cost_and_percent'] = $oneMonth[$i]['cost'];
      }
     }
 return $oneMonth;
}
//--------------- End премия -----------------//



//------------------ Штрафы -----------------------//
public function getFines($id, $numberOfDaysInMonth){
  $table = 'fines';
  $rows = 'fines.id, fines.id_drivers, hold_date, to_pay, due_date, drivers.driver';
  $join = ' LEFT OUTER JOIN drivers ON fines.id_drivers = drivers.id';
  $where = 'hold_date >= '. '"'."$id-01".'"' ." AND ". 'hold_date <='. '"'."$id".'-'."$numberOfDaysInMonth".'"';
  $order = 'due_date ASC';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}

public function getMonthWithFines($fines, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['fines'=> '0'];
    for ($j=0; $j < count($fines); $j++) {
        if($oneMonth[$i]['id_drivers'] == $fines[$j]['id_drivers']){
          $oneMonth[$i]['fines'] += $fines[$j]['to_pay'];
          }
       }
      }
  // var_export($oneMonth);
  return $oneMonth;
}
//--------------- End штрафы -----------------//


//-------- Лишние штрафы в следующий месяц -----------//
// проблема - закидывает при каждом обновлнии страницы salary на месяц вперед
// надо еще вставить условие сравнения, чтобы +1 месяц не закидывало вперед
// или hold_date устанавливать вручную
public function excessFinesNextMonth($fines, $oneMonth){
  for ($i=0; $i < count($fines); $i++) {
    for ($j=0; $j < count($oneMonth); $j++) {
        if($fines[$i]['driver'] != $oneMonth[$j]['driver']){
          //дальше можно возвратить просто массив, чтобы потом вызвать
          // функцию update, а можно не заморачиваться и ред-ть из этой фун-ии
          $id = $fines[$i]['id'];
          $date = $fines[$i]['hold_date'];
  // var_export($date);
          $dateAt = strtotime("+1 month", strtotime($date));


          $values[$i] = date('Y-m-d', $dateAt);
// var_export($values);
          $table = 'fines';
          $rows = array("hold_date");
          $where = 'id='.(int)$id;
// var_export($rows);
          // $base = new Base();
          // $base->update($table, $rows, $where, $values);

           }
       }
      }
    }




}
