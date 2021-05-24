<?php

class Cars extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице tractors
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
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'cars';
		$rows = 'brand, state_sign_cars, PTS_cars, STS_cars, VIN_cars';

		$base = new Base();
		$base->insert($table, $values, $rows);
	}


	public function getEdit($id, $values) {
		$table = 'cars';
		$rows = array("brand", "state_sign_cars", "PTS_cars", "STS_cars", "VIN_cars");
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}

	public function deleteCar($id) {
		$table = 'cars';
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->delete($table, $where);
	}
}
