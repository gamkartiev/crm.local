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

	public function getInsert($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note) {
		$table = 'flights';
		$values = array($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note,1,1);
		$rows = 'place_1, place_2, date_1, date_2, freight, weight, volume, cost, form_of_payment, proxy, request, note, id_cars, id_customers';

		$base = new Base();
		$result = $base->insert($table, $values, $rows);

	}


}
