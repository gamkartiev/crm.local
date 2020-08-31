<?php

class Cars extends Base
{
	public function getAllSelect() {
		$table = 'cars';
		$rows = '*';
		$where = 'null';
		$order = 'state_sign_cars';

		$base = new Base();
		$base->select($table, $rows, $where, $order);
		var_dump($result);

		return $result;

		// $sql = "SELECT `id`, `state_sign_cars` FROM `cars` ORDER BY `state_sign_cars`";
		// return $sql;
	}

	public function getOneSelect($id) {
		$table = 'cars';
		$rows = 'id';
		$where = 'id='.(int)$id;
		$order = null;

		$base = new Base();
		$base->select($table, $rows, $where, $order);
		var_dump($result);

		return $result;


		// $sql = "SELECT * FROM `cars` WHERE `id`=".(int)$id;
		// return $sql;
	}
}
