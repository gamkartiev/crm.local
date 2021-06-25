<?php

class Drivers extends Base
{
	public function getAllSelect() {
		$table = 'drivers';
		$rows = 'id, surname, first_name, patronymic';
		$join =	'';
		$where = '';
		$order = 'surname';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id) {
		$table = 'drivers';
		$rows = '*';
		$join =	'';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

//показывает последний добавленную строчку (id, если быть точнее)
	public function getLastInsertId($values) {
		$table = 'drivers';
		$rows = 'id';
		$join =	'';
		$where = 'surname='.'"'.$values[0].'"';

		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		$result = $result['0']['id'];

		return $result;
	}

	public function getInsert($values) {
		$table = 'drivers';
		// $values = ; соответствующий массив передается из контроллера
		$rows = 'surname, first_name, patronymic, date_of_birth, place_of_birth,
						passport, registration, drivers_license, phone_1, phone_2, phone_3';

		$base = new Base();
		$base->insert($table, $values, $rows);

	}

	public function getEdit($id, $values) {
		$table = 'drivers';
		// $values = ; соответствующий массив передается из контроллера
		$rows = array("surname", "first_name", "patronymic", "date_of_birth", "place_of_birth",
						"passport", "registration", "drivers_license", "phone_1", "phone_2", "phone_3");
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}

	public function deleteDriver($id) {
		$table = 'drivers';
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->delete($table, $where);
	}
}
