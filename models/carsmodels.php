<?php

class Cars extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице tractors
		$table = 'cars';
		$rows = 'id, brand, state_sign_cars';
		$join = '';
		$where = '';
		$order = 'brand, state_sign_cars';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id) {
		$table = 'cars';
		$rows = '*';
		$join =	'';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


	public function getInsert($values) {
		$table = 'cars';
		$rows = 'brand, state_sign_cars, PTS_cars, STS_cars, VIN_cars';

		$base = new Base();
		$base->insert($table, $values, $rows);
	}


	//вывести данные о водителе привязанном к машине
	public function getDriversWorkShedule($id) {
		//можно вместо этой функции вызвать через getOneSelect (было бы так правильнее)
		// $id_cars = $id
		$table = 'drivers_work_shedule';
		$rows = 'drivers_work_shedule.id AS id_drivers_work_shedule, drivers_work_shedule.id_drivers, drivers.driver,	start, the_end';
		$join =	' LEFT OUTER JOIN drivers ON drivers_work_shedule.id_drivers=drivers.id';
		$where = 'id_cars='.(int)$id; //'id='.(int)$id;
		$order = 'drivers_work_shedule.id DESC LIMIT 1';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);
		// var_export($result);
		return $result;

	}


	//привязка нового водителя к машине
	public function getLinkANewDriver ($values) {
		$table = 'drivers_work_shedule';
		$rows = "`id_cars`, `id_drivers`, `start`, `the_end`";

		$base = new Base();
		$base->insert($table, $values, $rows);
	}


  public function editTheEnd($id, $the_end){
		$values = array($the_end);
		$table = 'drivers_work_shedule';
		$rows = array("the_end");
		$join =	'';
		$where = 'id='.(int)$id; //'id='.(int)$id;
		$order = '';

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}


	public function getEdit($id, $values) {
		$table = 'cars';
		$rows = array("brand", "state_sign_cars", "PTS_cars", "STS_cars", "VIN_cars");
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}

	public function deleteCar($id) {
		$table = 'cars';
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


	//поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
	public function getFirstItemDrivers($drivers, $oneCarName){
		$count = count($drivers); //кол-во эл-тов в массиве $customers

		for ($i=0; $i<$count; $i++) {
			if($oneCarName['0']['driver']===$drivers[$i]['driver']) {
				$selectItem = array_slice($drivers, $i, 1);					//скопировать нужный элемент массива
				$deleteItemInArray = array_splice($drivers, $i, 1);	//удалить тот элемент массиве, что мы выбрали
				$drivers = array_merge($selectItem, $drivers);			//объед-ть 2 массива, 1-м поставив скопированный массив
				}
			}

			return $drivers;
	}
}
