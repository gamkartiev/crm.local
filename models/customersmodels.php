<?php

class Customers extends Base
{
	public function getAllSelect() {
		$table = 'Customers';
		$rows = 'id, short_name';
		$where = '';
		$order = 'short_name';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;

		// $sql = "SELECT  `id`, `short_name` FROM `Customers` ORDER BY `short_name`";
		// return $sql;
	}

	public function getOneSelect($id) {
		$table = 'Customers';
		$rows = '*';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;

		// $sql = "SELECT * FROM `Customers` WHERE `id`=".(int)$id;
		// return $sql;
	}
}
