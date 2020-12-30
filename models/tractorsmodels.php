<?php

class Tractors extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице tractors
		$table = 'tractors';
		$rows = 'id, brand, state_sign_tractor';
		$join = '';
		$where = '';
		$order = 'brand, state_sign_tractor';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id) {
		$table = 'tractors';
		$rows = '*';
		$join =	'';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'tractors';
		$rows = 'state_sign_tractor, PTS_tractor, STS_tractor, VIN_tractor';

		$base = new Base();
		$base->insert($table, $values, $rows);
	}


	public function getEdit($id, $values) {
		$table = 'tractors';
		$rows = array("state_sign_tractor", "PTS_tractor", "STS_tractor", "VIN_tractor");
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}

	public function deleteTractor($id) {
		$table = 'tractors';
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->delete($table, $where);
	}
}
