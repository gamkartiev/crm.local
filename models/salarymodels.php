<?php

class Salary extends Base
{
  public function getAllSelect() {
    $table = 'flights';
    $rows = 'date_2';
    $join =	'';
    $where = '';
    $order = 'date_2 DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    //Получить весь список месяцев
    // var_export($result);
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
    // var_export($getNormalFormatEndMonth);

    $table = 'flights';
    $rows = '*';
    $join =	'';
    $where = 'date_2 >= ' . '"' . "$getNormalFormatStartMonth" . '"' . " AND "  . 'date_2 <=' . '"' . "$getNormalFormatEndMonth". '"';
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    // var_export($result);
    return $result;

  }

}


 ?>
