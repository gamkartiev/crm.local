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


//Эта функция сделана для вывода последнего месяца с зарплатой при первом открытии страницы salary
//Тут нужно сделать повторный запрос к бд с новыми вводными, сначала изменив день на от 01 до 31. Также,
// было бы желательно сделать одну функцию, которая выводит основные данные для функций lastMonth, oneMonth и
// allSalaryMonth, а уже эти три функции преобразуют их в необходимый формат и сокращают столько, скольо нужно.
public function getlastMonth() {
  $table = 'flights';
  $rows = 'date_2';
  $join =	'';
  $where = '';
  $order = 'date_2 DESC limit 1';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  //Переделываем числовой формат в нужный текстовый
  $getOnlyMonth = substr($result['0']['date_2'], 5, 2);
  $getOnlyYear = substr($result['0']['date_2'], 0, 4);

  $getUnixTimestamp = strtotime($getOnlyYear."-".$getOnlyMonth);
  $result = date('M Y', $getUnixTimestamp);

  // var_export($getNormalFormat);
  // var_export($getOnlyYear);

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
  $rows = 'id, date_2, driver, drivers_payment';
  $join =	'';
  $where = 'date_2 >= ' . '"' . "$getNormalFormatStartMonth" . '"' . " AND "  . 'date_2 <=' . '"' . "$getNormalFormatEndMonth". '"';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  $res = [];

  // дальше слишком длинный код - исправить/сократить
  foreach ($result as $value) {
    $driver = $value['driver'];
    $cost = $value['drivers_payment'];

    if(!isset($res[$driver])) {
      $res[$driver] = 0;
      }

    $res[$driver] += $cost;
   }

    foreach ($res as $driver => $cost) {
      $result_1[] = [
        'driver' => $driver,
        'cost' => $cost,
      ];
    }

    return $result_1;
  }



//--------------------------------------------//
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
//-------------------------------------------------//


//---------------------------------------------//
public function getFines($id){
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

  $table = 'fines';
  $rows = 'id, driver, hold_date, to_pay, due_date';
  $join = '';
  $where = 'hold_date >= ' . '"' . "$getNormalFormatStartMonth" . '"' . " AND "  . 'hold_date <=' . '"' . "$getNormalFormatEndMonth". '"';
  $order = 'due_date ASC';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


//-----------------Добавить штрафы в месяц в зарплату----------------------------//
public function getMonthWithFines($fines, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['fines'=> '0'];
    for ($j=0; $j < count($fines); $j++) {
        if($oneMonth[$i]['driver'] == $fines[$j]['driver']){
          $oneMonth[$i]['fines'] += $fines[$j]['to_pay'];
          }
       }
      }
  // var_export($oneMonth);
  return $oneMonth;
}
//---------------------------------------------//


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
  var_export($date);
          $dateAt = strtotime("+1 month", strtotime($date));


          $values[$i] = date('Y-m-d', $dateAt);
var_export($values);
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

// public function getPrr($id, $oneMonth){
//   for ($i=0; $i < $oneMonth; $i++) {
//     // code...
//   }
// }



}
