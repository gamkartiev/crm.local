<?php

class DriversOtherWorks extends Base
{

  //////********** Это прочие работы ***********/////////

  public function getAllSelect($id){
    $table = 'drivers_other_works';
    $rows = 'drivers_other_works.id, drivers_other_works.sum,
             drivers_other_works.date_of_work, drivers_other_works.note, drivers_other_works.id_status,
             configuration.status, drivers.driver';
    $join = ' LEFT OUTER JOIN configuration ON drivers_other_works.id_status = configuration.id
              LEFT OUTER JOIN drivers ON drivers_other_works.id_drivers = drivers.id';
    $where = " date_of_work >= " . '"'."$id-01".'"' ." AND ". "date_of_work <= " . '"'."$id-31".'"';
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }

  public function getOneSelect($id){
    $table = 'drivers_other_works';
    $rows = 'drivers_other_works.id, drivers_other_works.sum, drivers_other_works.date_of_work,
             drivers_other_works.note, drivers_other_works.id_status, configuration.status,
             drivers.driver, drivers.id AS id_drivers';
    $join = ' LEFT OUTER JOIN configuration ON drivers_other_works.id_status = configuration.id
              LEFT OUTER JOIN drivers ON drivers_other_works.id_drivers = drivers.id';
    $where = " drivers_other_works.id=".(int)$id;
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }

  public function getInsert($values) {
    $table = 'drivers_other_works';
    $rows = 'id_drivers, sum, date_of_work, status, note';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }


  public function getEdit($id, $values) {
    $table = 'drivers_other_works';
    $rows = array("id_drivers", "sum", "date_of_work", "id_status", "note");
    $where = 'drivers_other_works.id='.(int)$id;

    $base = new Base();
    $base->update($table, $rows, $where, $values);
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

  ////**************** ****************/////


  //поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
  public function getFirstItemDrivers($drivers, $oneSelect){
  	$count = count($drivers); //кол-во эл-тов в массиве $drivers

  	for ($i=0; $i<$count; $i++) {
  		if( $oneSelect[0]['id_drivers']===$drivers[$i]['id']) {
        $selectItem = array_slice($drivers, $i, 1);         //скопировать нужный элемент массива
    		$deleteItemInArray = array_splice($drivers, $i, 1);  //удалить тот элемент массиве, что мы выбрали
    		$drivers = array_merge($selectItem, $drivers);        //объед-ть 2 массива, 1-м поставив скопированный массив
  			}
  		}
  	return $drivers;
  }


  public function getFirsItemStatus($status, $oneSelect){
      $count = count($status); //кол-во эл-тов в массиве $status

      for ($i=0; $i<$count; $i++) {
      if($oneSelect[0]['id_status']===$status[$i]['id']){
        $selectItem = array_slice($status, $i, 1);    //скопировать нужный элемент массива
        $deleteItem = array_splice($status, $i, 1);    //удалить тот элемент массиве, что мы выбрали
        $status = array_merge($selectItem, $status);  //объед-ть 2 массива, 1-м поставив скопированный массив
      }
    }
    return $status;
  }



}
