<?php

class Drivers extends Base
{
	public function getAllSelect() {
		$table = 'drivers';
		$rows = 'id, surname, first_name, patronymic';
		$where = '';
		$order = 'surname';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;
	}

	public function getOneSelect($id) {
		$table = 'drivers';
		$rows = '*';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $where, $order);

		return $result;
	}

}
