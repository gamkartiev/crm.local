<?php

class Cars extends Base
{
	public function getAllSelect() { //левая колонка при выводе данных на странице cars(Тягачи и прицепы)
		$table = 'history_car';
		$rows = 'history_car.id, id_tractor, id_driver, id_trailer, created_add, updated_add,
						tractors.id, tractors.brand AS brand_tractor, state_sign_tractor';
		$join = ' LEFT OUTER JOIN tractors ON id_tractor = tractors.id';
		$where = '';
		$order = 'history_car.id';

		$base = new Base();
		$result_1 = $base->select($table, $rows, $join, $where, $order);
	var_export($result_1);

		$table = 'history_car';
		$rows = 'history_car.id, id_tractor, id_driver, id_trailer, created_add, updated_add,
						trailers.id, trailers.brand AS brand_trailer, state_sign_trailer';
		$join = ' LEFT OUTER JOIN trailers ON id_trailer = trailers.id';
		$where = '';
		$order = 'history_car.id';

		$base = new Base();
		$result_2 = $base->select($table, $rows, $join, $where, $order);

		// $n = count($result_1);
		// for ($row=0; $row < count($result_1); $row++) {
		// 	$result[] = $result_1[$row]+$result_2[$row];
		// }


			// $result = ($result_1+ $result_2);

		var_export($result[0]);
	// var_export($result_2);
		return $result_1[0];

	}

	public function getOneSelect($id) {
		$table = 'history_car';
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
		$rows = 'state_sign_cars, PTS_cars, STS_cars, VIN_cars, id_drivers, id_trailers, date_start';

		$base = new Base();
		$base->insert($table, $values, $rows);
	}


	public function getEdit($id, $values) {
		$table = 'cars';
		$rows = array("state_sign_cars", "PTS_cars", "STS_cars", "VIN_cars");
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
