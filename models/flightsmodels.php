<?php

class Flights extends Base
{

	public function getAllSelect() {
		$table = 'flights';
		$rows = '*';
		$join = '';
		$where = '';
		$order = 'date_1 DESC, date_2 DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getOneSelect($id){
		$table = 'flights';
		$rows = '*';
		$join = '';
		$where = 'flights.id ='.$id;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


//фун-я выборки всех клиентов для Формы вставки нового рейса
	public function getCustomersSelect() {
		$table = 'Customers';
		$rows = 'id, short_name';
		$join = '';
		$where = '';
		$order = 'short_name DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


//поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
	public function getFirstItemCustomers($customers, $oneFlights){
		$count = count($customers); //кол-во эл-тов в массиве $customers
		for ($i=0; $i<$count; $i++) {
				if($oneFlights[0]['customers']===$customers[$i]['short_name']) {
						$item[] = $customers[$i]; //это в принципе не нужно
						$key = $i; //ключ нужного нам элемента в массиве customers
				}
			}
			//скопировать нужный элемент массива
			//удалить тот элемент массиве, что мы выбрали
			//объединить два массива, первым поставив скопированный массив
			$selectItem = array_slice($customers, $key, 1);
			$deleteItemInArray=array_splice($customers, $key, 1);
			$customers = array_merge($selectItem, $customers);

			return $customers;
	}


	//поставить первым в массиве тот элемент, что находиться в бд (чтобы по умолчанию выскакивал он)
		public function getFirstItemCars($cars, $oneFlights){
			$count = count($cars); //кол-во эл-тов в массиве $customers

			for ($i=0; $i<$count; $i++) {
					if($oneFlights[0]['car']===$cars[$i]['state_sign_cars']) {
							$item[] = $cars[$i]; //это в принципе не нужно
							$key = $i; //ключ нужного нам элемента в массиве customers
					}
				}
				//скопировать нужный элемент массива
				//удалить тот элемент массиве, что мы выбрали
				//объединить два массива, первым поставив скопированный массив
				$selectItem = array_slice($cars, $key, 1);
				$deleteItemInArray=array_splice($cars, $key, 1);
				$cars = array_merge($selectItem, $cars);

				return $cars;
		}

//фун-я выборки всех тягачей для Формы вставки нового рейса
	public function getCarsSelect() {
		$table = 'Cars';
		$rows = 'state_sign_cars';
		$join = '';
		$where = '';
		$order = 'state_sign_cars DESC';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}


	public function getIdCustomers($customers) {
		$table = 'Customers';
		$rows = 'id, short_name';
		$join = '';
		$where = 'short_name='.$customers;
		$order = '';

		$base = new Base();
		$result = $base->select($table, $rows, $join, $where, $order);

		return $result;
	}

	public function getInsert($values) {
		$table = 'flights';
		// $values = ; соответствующий массив передается из контроллера
		$rows = 'place_1, place_2, date_1, date_2, freight, weight,
							volume, cost, form_of_payment, car, customers, proxy,
							request, note ';

		$base = new Base();
		$result = $base->insert($table, $values, $rows);

	}

	public function getEdit($id, $values) {
		$table = 'flights';
		$rows = array("place_1", "place_2", "date_1", "date_2", "freight", "weight", "volume",
		"cost", "form_of_payment", "car", "customers", "proxy", "request", "note");
		$where = 'id='.(int)$id;
		$base = new Base();
		$base->update($table, $rows, $where, $values);
	}


	public function deleteFlight($id) {
		$table = 'flights';
		$where = 'id='.(int)$id;

		$base = new Base;
		$base->delete($table, $where);
	}
}
