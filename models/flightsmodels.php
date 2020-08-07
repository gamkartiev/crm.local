<?php

class Flights extends Base
{
	protected function sqlGetAllString() {
		$sql = "SELECT 	* FROM `flights` ORDER BY `id` DESC";
		return $sql;
	}

	protected function sqlCreateString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note) {

		$sql = "INSERT INTO `flights`(`place_1`, `place_2`, `date_1`, `date_2`, `freight`, `weight`, `volume`, `cost`, `form_of_payment`, `proxy`, `request`, `note`, `id_customers`, `id_cars`)
												VALUES ('$place_1', '$place_2', '$date_1', '$date_2', '$freight', '$weight', '$volume', '$cost', '$form_of_payment', '$proxy', '$request',	 '$note', '1', '1')";
		return $sql;
	}
}
