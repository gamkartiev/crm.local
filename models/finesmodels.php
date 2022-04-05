<?php

class Fines extends Base
{
  public function getAllSelect(){
    $table = 'fines';
    $rows = '*';
    $join = '';
    $where = '';
    $order = 'due_date DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }



  public function getOneSelect($id) {
    $table = 'fines';
    $rows = '*';
    $join = '';
    $where = 'id='.(int)$id;
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }


  public function getInsert($values) {
    $table = 'fines';
    $rows = 'driver, decree, date_of_violation, time_of_violation,
      car, hold_date, withheld, to_pay, due_date, after_the_due_date,
      date_of_application, note, status';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }


  public function getEdit($id, $values) {
    $table = 'fines';
    $rows = array("driver", "decree", "date_of_violation", "time_of_violation",
      "car", "hold_date", "withheld", "to_pay", "due_date", "after_the_due_date",
      "date_of_application", "note", "status");
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->update($table, $rows, $where, $values);
  }

  public function deleteFines($id) {
    $table = 'fines';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }


  //фун-я выборки всех тягачей для Формы вставки нового рейса
	public function getCarsSelect() {
		$table = 'Cars';
		$rows = 'state_sign_cars';
		$join = '';
		$where = '';
		$order = 'state_sign_cars DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
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


  //поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
  public function getFirstItemCars($cars, $oneFine){
  	$count = count($cars); //кол-во эл-тов в массиве $customers

  	for ($i=0; $i<$count; $i++) {
  		if($oneFine[0]['car']===$cars[$i]['state_sign_cars']) {
        $selectItem = array_slice($cars, $i, 1);          //скопировать нужный элемент массива
        $deleteItemInArray = array_splice($cars, $i, 1);  //удалить тот элемент массиве, что мы выбрали
        $cars = array_merge($selectItem, $cars);          //объед-ть 2 массива, 1-м поставив скопированный массив
  			}
  		}
    return $cars;
  }


  //поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
  public function getFirstItemDrivers($drivers, $oneFine){
  	$count = count($drivers); //кол-во эл-тов в массиве $customers

  	for ($i=0; $i<$count; $i++) {
  		if( $oneFine[0]['driver']===$drivers[$i]['driver']) {
        $selectItem = array_slice($drivers, $i, 1);         //скопировать нужный элемент массива
    		$deleteItemInArray = array_splice($drivers, $i, 1);  //удалить тот элемент массиве, что мы выбрали
    		$drivers = array_merge($selectItem, $drivers);        //объед-ть 2 массива, 1-м поставив скопированный массив
  			}
  		}
  	return $drivers;
  }
}