<?php

class Flights extends Base
{

	public function getAllSelect() {
		$table = 'flights';
		$rows = '*';
		$join = '';
		$where = '';
		$order = 'date_1 DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);
 		var_export($result);

		return $result;
	}

	public function getOneSelect($id){
		$table = 'flights';
		$rows = '*';
		$join = '';
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
		$rows = 'id, state_sign_cars';
		$join = '';
		$where = '';
		$order = 'state_sign_cars DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


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
							volume, cost, form_of_payment, car, customers, proxy,
							request, note ';

		$base = new Base();
		$result = $base->insert($table, $values, $rows);

	}

	public function getEdit($id, $values) {
		$table = 'flights';
		$rows = array("place_1", "place_2", "date_1", "date_2", "freight", "weight", "volume",
		"cost", "form_of_payment", "car", "customers", "proxy", "request", "note");
		$where = 'id='.(int)$id;
		// var_dump($id);
		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}


	public function deleteFlight($id) {
		$table = 'flights';
		$where = 'id='.(int)$id;

		$base = new Base;
		$base->delete($table, $where);
	}
}
