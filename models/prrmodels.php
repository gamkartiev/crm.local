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
