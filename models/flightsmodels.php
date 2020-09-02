<?php

class Flights extends Base
{
	public function getAllSelect() {
		$table = 'flights';
		$rows = '*';
		$order = 'id DESC';
		$where = '';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'flights';

		$rows = '	place_1, place_2, date_1, date_2, freight, weight,
							volume, cost, form_of_payment, proxy,
							request, note, id_cars, id_customers';

		$base = new Base();
		$result = $base->insert($table, $values, $rows);

	}


}
