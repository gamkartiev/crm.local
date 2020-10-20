<?php

class Cars extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице cars
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
		$result_1 = $base->select($table, $rows, $join, $where, $order);

		$table = 'history_cars';
		$rows = '*';
		$join =	'';
		$where = 'id_cars'.(int)$id;
		$order = '';

		$base = new Base();
		$result_2 = $base->select($table, $rows, $join, $where, $order);

		$result = array_merge($result_1[0], $result_2[0]);
		return $result;

	}

	public function getInsert($values) {
		$table = 'cars';
		// $values = ; соответствующий массив передается из контроллера
		$rows = 'state_sign_cars, PTS_cars, STS_cars, VIN_cars, id_drivers, id_trailers, date_start';

		$base = new Base();
		$base->insert($table, $values, $rows);

	}
}
