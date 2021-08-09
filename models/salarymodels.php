<?php

class Salary extends Base
{
  public function getAllSelect() {
    $table = 'flights';
    $rows = 'id as , surname, first_name, patronymic, drivers payment';
    $join =	'LEFT OUTER JOIN ';
    $where = '';
    $order = 'surname';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }



}


 ?>
