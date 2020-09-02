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
}
