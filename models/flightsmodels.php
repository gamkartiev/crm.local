<?php

class Flights extends Base
{

	public function getAllSelect() {
		$table = 'flights';
		$rows = 'flights.id, place_1, place_2, date_1, date_2, freight, weight, volume, cost,
						form_of_payment, car, customers.short_name, proxy, request, flights.note, driver, drivers_payment';
		$join = ' LEFT OUTER JOIN customers ON flights.id_customers=customers.id';
		$where = '';
		$order = 'date_1 DESC, date_2 DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id){
		$table = 'flights';
		$rows = 'flights.id, place_1, place_2, date_1, date_2, freight, weight, volume, cost,
						form_of_payment, car, customers.short_name, proxy, request, flights.note, driver, drivers_payment';
		$join = ' LEFT OUTER JOIN customers ON flights.id_customers=customers.id';
		$where = 'flights.id ='.$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


//фун-я выборки всех клиентов для Формы вставки нового рейса
	public function getCustomersSelect() {
		$table = 'Customers';
		$rows = 'id, short_name';
		$join = '';
		$where = '';
		$order = 'short_name DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
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
	public function getFirstItemCustomers($customers, $oneFlights){
		$count = count($customers); //кол-во эл-тов в массиве $customers

		for ($i=0; $i<$count; $i++) {
			if($oneFlights[0]['short_name']===$customers[$i]['short_name']) {
				$selectItem = array_slice($customers, $i, 1);          //скопировать нужный элемент массива
				$deleteItemInArray = array_splice($customers, $i, 1); //удалить тот элемент массиве, что мы выбрали
				$customers = array_merge($selectItem, $customers);		//объед-ть 2 массива, 1-м поставив скопированный массив
				}
			}

			return $customers;
	}


	//поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
	public function getFirstItemCars($cars, $oneFlights){
		$count = count($cars); //кол-во эл-тов в массиве $customers

		for ($i=0; $i<$count; $i++) {
			if($oneFlights[0]['car']===$cars[$i]['state_sign_cars']) {
				$selectItem = array_slice($cars, $i, 1);					//скопировать нужный элемент массива
				$deleteItemInArray = array_splice($cars, $i, 1);	//удалить тот элемент массиве, что мы выбрали
				$cars = array_merge($selectItem, $cars);					//объед-ть 2 массива, 1-м поставив скопированный массив
				}
			}
			return $cars;
	}


	//поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
	public function getFirstItemDrivers($drivers, $oneFlights){
		$count = count($drivers); //кол-во эл-тов в массиве $customers

		for ($i=0; $i<$count; $i++) {
			if($oneFlights[0]['driver']===$drivers[$i]['driver']) {
				$selectItem = array_slice($drivers, $i, 1);					//скопировать нужный элемент массива
				$deleteItemInArray = array_splice($drivers, $i, 1);	//удалить тот элемент массиве, что мы выбрали
				$drivers = array_merge($selectItem, $drivers);			//объед-ть 2 массива, 1-м поставив скопированный массив
				}
			}

			return $drivers;
	}



//??? зачем нужен был этот блок??? - использовался при создании выпадающего спика и поиска id на соотв-ее
//название компании///
	public function getIdCustomers($customers) {
		$table = 'Customers';
		$rows = 'id, short_name';
		$join = '';
		$where = 'short_name='.$customers;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


	public function getInsert($values) {
		$table = 'flights';
		// $values = ; соответствующий массив передается из контроллера
		$rows = 'place_1, place_2, date_1, date_2, freight, weight,
							volume, cost, form_of_payment, car, id_customers, proxy,
							request, note, driver, drivers_payment';
		$join = '';
		$base = new Base();
		$result = $base->insert($table, $values, $rows);
	}


	public function getEdit($id, $values) {
		$table = 'flights';
		$rows = array("place_1", "place_2", "date_1", "date_2", "freight", "weight", "volume",
				"cost", "form_of_payment", "car", "id_customers", "proxy", "request", "note", "driver", "drivers_payment");
		$where = 'id='.(int)$id;
		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}


	public function deleteFlight($id) {
		$table = 'flights';
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->delete($table, $where);
	}
}
