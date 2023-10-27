<?php

class Checks extends Base
{
  public function getAllSelect(){
    $table = 'checks';
    $rows = 'checks.id, checks.id_drivers, checks.sum, checks.date,
            checks.note, checks.id_status, checks.availability_of_a_check,
             configuration.status AS status,
             drivers.id AS id_drivers, drivers.driver';
    $join = ' LEFT OUTER JOIN drivers ON checks.id_drivers = drivers.id
              LEFT OUTER JOIN configuration ON checks.id_status = configuration.id';
    $where = '';
    $order = 'date ASC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }



  public function getOneSelect($id) {
    $table = 'checks';
    $rows = 'checks.id, checks.id_drivers, checks.sum, checks.date,
             checks.note, checks.id_status, checks.availability_of_a_check,
             configuration.status AS status,
              drivers.driver';
    $join = ' LEFT OUTER JOIN drivers ON checks.id_drivers = drivers.id
              LEFT OUTER JOIN configuration ON checks.id_status = configuration.id';
    $where = 'checks.id='.(int)$id;
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }


  public function getInsert($values) {
    $table = 'checks';
    $rows = 'id_drivers, sum, date, note, id_status, availability_of_a_check';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }


  public function getEdit($id, $values) {
    $table = 'checks';
    $rows = array("id_drivers", "sum", "date", "note", "id_status", "availability_of_a_check");
    $where = 'checks.id='.(int)$id;

    $base = new Base();
    $base->update($table, $rows, $where, $values);
  }

  public function deleteChecks($id) {
    $table = 'checks';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }





  //фун-я выборки всех водителей для Формы вставки нового рейса
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


  //фун-я выборки статусов (оплачено или нет)
	public function getStatusSelect() {
		$table = 'configuration';
		$rows = 'id, status';
		$join = '';
		$where = '';
		$order = 'id ASC LIMIT 2';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

  //фун-я выборки статусов (есть чек или нет)
  public function getStatusOfACheck() {
    $table = 'configuration';
    $rows = 'id, status';
    $join = '';
    $where = '';
    $order = 'id ASC LIMIT 2 OFFSET 2';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }


  //поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
  public function getFirstItemDrivers($drivers, $oneCheck){
  	for ($i=0; $i < count($drivers); $i++) {
  		if( $oneCheck[0]['id_drivers']===$drivers[$i]['id']) {
        $selectItem = array_slice($drivers  , $i, 1);         //скопировать нужный элемент массива
    		$deleteItemInArray = array_splice($drivers, $i, 1);  //удалить тот элемент массиве, что мы выбрали
    		$drivers = array_merge($selectItem, $drivers);        //объед-ть 2 массива, 1-м поставив скопированный массив
  			}
  		}
  	return $drivers;
  }

  public function getFirsItemStatus($status, $oneCheck){
    for ($i=0; $i < count($status); $i++) {
      if($oneCheck[0]['id_status']===$status[$i]['id']){
        $selectItem = array_slice($status, $i, 1);    //скопировать нужный элемент массива
        $deleteItem = array_splice($status, $i, 1);    //удалить тот элемент массиве, что мы выбрали
        $status = array_merge($selectItem, $status);  //объед-ть 2 массива, 1-м поставив скопированный массив
      }
    }
    return $status;
  }

  public function getFirsItemStatusChecks($status_of_a_check, $oneCheck){
    for ($i=0; $i<count($status_of_a_check); $i++) {
      if($oneCheck[0]['availability_of_a_check']===$status_of_a_check[$i]['status']){
        $selectItem = array_slice($status_of_a_check, $i, 1);    //скопировать нужный элемент массива
        $deleteItem = array_splice($status_of_a_check, $i, 1);    //удалить тот элемент массиве, что мы выбрали
        $status = array_merge($selectItem, $status_of_a_check);  //объед-ть 2 массива, 1-м поставив скопированный массив
      }
    }
    return $status;
  }

}
