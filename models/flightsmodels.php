<?php

class Flights extends Base
{
	public function sqlGetAllString() {

		$table = 'flights';
		$rows = '*';
		$order = 'id DESC';
		$where = '';


		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;
	}

	protected function sqlCreateString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note) {

		$sql = "INSERT INTO `flights`(`place_1`, `place_2`, `date_1`, `date_2`, `freight`, `weight`, `volume`, `cost`, `form_of_payment`, `proxy`, `request`, `note`, `id_customers`, `id_cars`)
												VALUES ('$place_1', '$place_2', '$date_1', '$date_2', '$freight', '$weight', '$volume', '$cost', '$form_of_payment', '$proxy', '$request',	 '$note', '1', '1')";
		return $sql;
	}


}
