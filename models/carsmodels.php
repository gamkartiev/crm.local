<?php

class Cars extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице cars
		$table = 'cars';
		$rows = 'id, state_sign_cars';
		$where = '';
		$order = 'state_sign_cars';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;
	}


	public function getOneSelect($id) {
		$table = 'cars';
		$rows = '*';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

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
