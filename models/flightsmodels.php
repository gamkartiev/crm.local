<?php

class Flights extends Base
{

	public function getAllSelect() {
		$table = 'flights';
		$rows = ' flights.id as id_flights, place_1, place_2, date_1, date_2, freight, weight,
						volume, cost, form_of_payment, proxy, request, flights.note, car, flights.id_customers, customers.id,
						customers.short_name as customers';
		$join = ' LEFT OUTER JOIN customers ON flights.id_customers = customers.id';
		$where = 'flights.id_customers = customers.id';
		$order = 'flights.date_1 DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);
 		// var_export($result);

		return $result;
	}

	public function getOneSelect($id){
		$table = 'flights';
		$rows = ' flights.id as id_flights, place_1, place_2, date_1, date_2, freight, weight,
						volume, cost, form_of_payment, proxy, request, flights.note, car, flights.id_customers, customers.id,
						customers.short_name as customers';
		$join = ' LEFT OUTER JOIN customers ON flights.id_customers = customers.id';
		$where = 'flights.id ='.$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);
		// var_export($result);

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


	public function getInsert($values) {
		$table = 'flights';
		// $values = ; соответствующий массив передается из контроллера
		$rows = 'place_1, place_2, date_1, date_2, freight, weight,
							volume, cost, form_of_payment, car, id_customers, proxy,
							request, note ';

		$base = new Base();
		$result = $base->insert($table, $values, $rows);

	}


}
