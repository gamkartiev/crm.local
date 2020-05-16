<?php
// include ("../db.php");

class DbConnect
{
	private $serverName;
	private $userName;
	private $password;
	private $dbName;

	protected function connect() {
		$this->serverName = 'localhost';
		$this->userName = 'root';
		$this->password = '';
		$this->dbName = 'crmTransport';

		$connect = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
		return $connect;
		}
}

class Base extends DbConnect
{
	//вывод всего
	public function getAllString() {
		$sql = $this->sqlGetAllString();
		$result = $this->connect()->query($sql);

		$numRows = $result->num_rows;
		$string = array();

		for($i=0; $i<$numRows; $i++) {
			$row = $result->fetch_assoc();
			$string[] = $row;
		}
		return $string;
	}

	public function getOneString($id) {
		$sql = $this->sqlGetOneString($id);

		$result = $this->connect()->query($sql);
		$getOneString[] = $result->fetch_assoc();

		return $getOneString;
	}

	public function createString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost) {

		$sql = $this->sqlCreateString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost);
		$result = $this->connect()->query($sql);
		return true;
	}
}

class Cars extends Base
{
	protected function sqlGetAllString() {
		$sql = "SELECT `id`, `state_sign_cars` FROM `cars` ORDER BY `state_sign_cars`";
		return $sql;
	}

	protected function sqlGetOneString($id) {
		$sql = "SELECT * FROM `cars` WHERE `id`=".(int)$id;
		return $sql;
	}
}


class Drivers extends Base
{
	protected function sqlGetAllString() {
		$sql = "SELECT  `id`, `surname`, `first_name`, `patronymic` FROM `drivers` ORDER BY `surname`";
		return $sql;
	}

	protected function sqlGetOneString($id) {
		$sql = "SELECT * FROM `drivers` WHERE `id`=".(int)$id;
		return $sql;
	}

}


class Customers extends Base
{
	protected function sqlGetAllString() {
		$sql = "SELECT  `id`, `short_name` FROM `Customers` ORDER BY `short_name`";
		return $sql;
	}

	protected function sqlGetOneString($id) {
		$sql = "SELECT * FROM `Customers` WHERE `id`=".(int)$id;
		return $sql;
	}
}


class Flights extends Base
{
	protected function sqlGetAllString() {
		$sql = "SELECT 	`id`,	`date_1`, `date_2`,	`place_1`,	`place_2`, `freight`,
										`weight`,	`cost`,	`volume` FROM `flights`
										ORDER BY `id` DESC";
		return $sql;
	}

	protected function sqlCreateString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost) {

		$sql = "INSERT INTO `flights` (`place_1`, `place_2`, `date_1`, `date_2`, `freight`, `weight`, `volume`, `cost`)
							VALUES ('$place_1', '$place_2', '$date_1', '$date_2', '$freight', '$weight', '$volume', '$cost')";
		return $sql;
	}
}


// $sql = "INSERT INTO `flights`(`date_1`, `date_2`, `place_1`,
// 										`place_2`, `freight`, `weight`, `cost`, `form_of_payment`, `volume`, `proxy`, `request`, `note`)
// 	 						VALUES '$date_1', '$date_2', '$place_1', '$place_2', '$freight',
// 										'$weight', '$cost', '$formOfPayment', '$volume', '$proxy', '$request', '$note'";


// public function createString($date_1, $date_2, $place_1, $place_2, $freight,
// 					$weight, $cost, $formOfPayment, $volume, $proxy, $request, $note) {
// 	$sql = $this->sqlCreateString($date_1, $date_2, $place_1, $place_2, $freight,
// 						$weight, $cost, $formOfPayment, $volume, $proxy, $request, $note);
// 	$result = $this->connect()->query($sql);
// 	return true;
// }

// protected function sqlCreateString($date_1, $date_2, $place_1, $place_2, $freight,
// 					$weight, $cost, $formOfPayment, $volume, $proxy, $request, $note) {
// $sql = "INSERT INTO `flights`(`date_1`, `date_2`, `place_1`, `place_2`, `freight`,
// 					`weight`, `cost`, `formOfPayment`, `volume`, `proxy`, `request`, `note`, `id_customers`, `id_drivers`, `id_cars`) VALUES ('$date_1', '$date_2', '$place_1', '$place_2', '$freight',
// 					'$weight', '$cost', '$formOfPayment', '$volume', '$proxy', '$request', '$note', '1', '1', '1')";

// createFlight() {}
// createDriver()
//createCar()
//createCustomer()


//editFlight()
//editDriver()
//editCar()
//editCustomer()


// deleteFlight()
//deleteDriver()
//deleteCar()
//deleteCustomer()
