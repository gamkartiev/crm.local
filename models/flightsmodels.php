<?php

class Flights extends Base
{
	public function getSelect() {
		$table = 'flights';
		$rows = '*';
		$order = 'id DESC';
		$where = '';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;
	}

	protected function getInsert($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note) {
		// $place_1 = $_POST['place_1'];
		// $place_2 = $_POST['place_2'];
		// $date_1 = $_POST['date_1'];
		// $date_2 = $_POST['date_2'];
		// $freight = $_POST['freight'];
		// $weight = $_POST['weight'];
		// $volume = $_POST['volume'];
		// $cost = $_POST['cost'];
		// $form_of_payment = $_POST['form_of_payment'];
		// $proxy = $_POST['proxy'];
		// $request = $_POST['request'];
		// $note = $_POST['note'];


		`place_1`, `place_2`, `date_1`, `date_2`, `freight`, `weight`, `volume`, `cost`, `form_of_payment`, `proxy`, `request`, `note`, `id_customers`, `id_cars`
		'$place_1', '$place_2', '$date_1', '$date_2', '$freight', '$weight', '$volume', '$cost', '$form_of_payment', '$proxy', '$request',	 '$note', '1', '1'
		return $sql;
	}


}
