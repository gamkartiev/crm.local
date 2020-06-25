<?php
// include ("../db.php");

class DbConnect
{
	private $connection;
	private $serverName;
	private $userName;
	private $password;
	private $dbName;

	protected function getConnection() {
		if($this->connection !==null) {
			return $this->connection;
		}

		$this->connection = $this->connect();
		return $this->connection;
	}

	protected function connect() {
		$this->serverName = 'localhost';
		$this->userName = 'root';
		$this->password = 'root';
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
		$result = $this->getConnection()->query($sql);

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

		$result = $this->getConnection()->query($sql);
		$getOneString[] = $result->fetch_assoc();

		return $getOneString;
	}

	public function createString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note) {
		$mysqli = $this->getConnection();

		$sql = $this->sqlCreateString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note);
		$mysqli->query($sql);

		/*проверяем соединение*/
		if($mysqli->connect_errno) {
			printf("Соединение не удалось: %s\n",$mysqli->connect_error);
			exit();
		}

		if (!$mysqli->query($sql)) {
    	printf("Сообщение ошибки: %s\n", $mysqli->error);
			printf("Номер ошибки: %s\n", $mysqli->errno);
		}

		/* Закрыть соединение */
		$mysqli->close();

		return true;
	}
}














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
