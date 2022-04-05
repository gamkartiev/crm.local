<?php

class Prr extends Base
{
  public function getAllSelect() {
    $table = 'flights';
    $rows = 'id, driver, drivers_payment';
    $join =	'LEFT OUTER JOIN ';
    $where = '';
    $order = 'driver';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }

  //добаление нового события (например, выходного для водителя)
  public function getInsert($values){
    $table = 'weekend_drivers';
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

}


 ?>
