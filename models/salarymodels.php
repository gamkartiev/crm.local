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
    $getUnixTimestamp = strtotime($id);
    var_export($id);
    var_export($getUnixTimestamp);
    $getNormalTimeFormat = date("m:y", $getUnixTimestamp);
    var_export($getNormalTimeFormat);
  }

}


 ?>
