<?php

class Customers extends Base
{
	public function getAllSelect() {
		$table = 'Customers';
		$rows = 'id, short_name';
		$join = '';
		$where = '';
		$order = 'short_name';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id) {
		$table = 'Customers';
		$rows = '*';
		$join =	'';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'customers';
		// $values = ; соответствующий массив передается из контроллера
		$rows = 'name, short_name, INN, OGRN, actual_address, legal_address, mailing_address,
							KPP, OKPO_code, OKFC_code, OKOPF_code, OKVED_main_code, CEO, bank,
							payment_account, correspondent_account, BIK, note';

		$base = new Base();
		$base->insert($table, $values, $rows);

	}
}
