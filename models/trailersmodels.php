<?php
// Пока не рабочий
class Trailers extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице cars
		$table = 'trailers';
		$rows = 'id, brand, state_sign_trailer';
		$join = '';
		$where = '';
		$order = 'brand, state_sign_trailer';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}



	public function getOneSelect($id) {
		$table = 'trailers';
		$rows = '*';
		$join =	'';
		$where = 'id='.(int)$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'trailers';
		$rows = 'state_sign_trailer, PTS_trailer, STS_trailer, VIN_trailer';

		$base = new Base();
		$base->insert($table, $values, $rows);
	}



	public function getEdit($id, $values) {
		$table = 'trailers';
		$rows = array("state_sign_trailer", "PTS_trailer", "STS_ctrailer", "VIN_trailer");
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}



	public function deleteTrailer($id) {
		$table = 'trailers';
		$where = 'id='.(int)$id;

		$base = new Base();
		$base->deleteTrailers($table, $where);
	}

}
