<?php

class Customers extends Base
{
	public function getAllSelect() {
		$table = 'customers';
		$rows = 'id, short_name';
		$join = '';
		$where = '';
		$order = 'short_name';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id) {
		$table = 'customers';
		$rows = '*';
		$join =	'';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);
		// var_export($result);
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


	public function getEdit($id, $values) {
		$table = 'customers';
		// $values = ; соответствующий массив передается из контроллера
		$rows = array("name", "short_name", "INN", "OGRN", "actual_address", "legal_address", "mailing_address",
							"KPP", "OKPO_code", "OKFC_code", "OKOPF_code", "OKVED_main_code", "CEO", "bank",
							"payment_account", "correspondent_account", "BIK", "note");
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}

	public function deleteCustomer($id) {
		$table = 'customers';
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->delete($table, $where);
	}
}
