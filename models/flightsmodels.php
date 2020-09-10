<?php

class Flights extends Base
{
	public function getAllSelect() {
		$table = 'flights';
		$rows = 'flights.id, place_1, place_2, date_1, date_2, freight, weight,
						volume, cost, form_of_payment, proxy, request, note, id_cars,
						cars.id, state_sign_cars';
		$join = ' LEFT OUTER JOIN cars ON flights.id_cars = cars.id';
		$where = '';
		$order = 'flights.id DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'flights';
		// $values = ; соответствующий массив передается из контроллера
		$rows = '	place_1, place_2, date_1, date_2, freight, weight,
							volume, cost, form_of_payment, proxy,
							request, note, id_cars, id_customers';

		$base = new Base();
		$result = $base->insert($table, $values, $rows);

	}


}
