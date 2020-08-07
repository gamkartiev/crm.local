<?php
class DataBase
{
private db_host ="";
private db_user ="";
private db_pass ="";
private db_name ="";

	/*
	*	Содиеняемся с бд. Разрешено только одно соединение
	*/
	public function connect() {
		if(!$this->con) {
			$mycon = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
			if($mycon) {
				$seldb = mysqli_connect_db($this->dbname, $mycon);
				if($seldb) {
					$this->con = true;
					return true;
				} else { //если есть ошибка в mysql_connect_db, то...
					return false;
					}
			} else { //если есть ошибка в mysql_connect, то...
				return false;
				}
		} else { //если есть подключение $con - задано, то...
			return true;
			}
	}


	/*
	* Проверяет переменную соединения на существования
	* Если соедение установлено (con есть), то закрываем соединение и
	* возвращаем true
	*/
	public function disconnect() {
		if($this->con) {
			if(mysqli_close()) {
				$this->con = false;
				return true; //задает переменной $con=false и возвращает true
			} else {
				return false; //возвращает false, если mysqli_close не прошло
			  }
		}
	}

	private $result = array(); //нужно ли

	/*
	* Проверяет наличие таблицы при выполнении запроса
	*
	*/
	private function tableExists($table) {
		$tablesInDb = mysqli_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
		if($tableInDb) {
			if(mysqli_num_rows($tableInDb)==1) {
				return true; // если таблица существует, то вернет true
			} else {
				return false; // если таблицы не существует, то вернет false
			}
		}
	}

	/*
	* Выборка информации из бд
	* Требуется: table (наименование таблицы)
	* Опционально: rows (требуемые колонки, разделитель запятая)
	* 						 where (колонка = значение, передаем строкой)
	*							 order (сортировка, передаем строкой)
	*/
	public function select($table, $rows = '*', $where = null, $order = null) {
		$q = 'SELECT '.$rows.' FROM '.$table;
		if($where != null)
			$q .=' WHERE '.$where;
		if($order !=null)
			$q .= ' ORDER BY '.$order;
		if($this->tableExists($table)) {
			$query = mysqli_query($q);
			if($query) {
				$this->numResults = mysqli_num_rows($query);
				for($i = 0; $i < $this->numResults; $i++) {
					$r = mysqli_fetch_array($query);
					$key = array_keys($r);
					for($x = 0; $x < count($key); $x++) {
								// Sanitizes keys so onlu alphavalues are allowed
								if(!is_int($key[$x])) {
									if(mysqli_num_rows($query) > 1)
											$this->result[$i][$key[$x]] = $r[$key[$x]];
									else if(mysqli_num_rows($query) < 1)
											$this->result = null;
									else
											$this->result[$key[$x]] = $r[$key[$x]];
						} //проверят
					}
				}
				return true; // если запрос $query был выполнен
			}	else {
					return false; // если запрос $query не был выполнен
				}
		} else {	// если такая таблица не существует
				return false;
			}
	}

	/*
	* Вставляем значения в таблицу
	* Требуемые: table (наименование таблицы)
	* 					 values (вставляем значения, передается массив значений, например,
	* 									 array(3,"Name 4", "this@wasinsert.ed");)
	* Опционально: rows (название столбцов, куда вставляем значения, передается
	*										строкой, например, 'title,meta,date')
	*
	*/
	public function insert($table, $values, $rows = null) {}
	public function update() {}
	public function delete() {}
}



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

		// if (!$mysqli->query($sql)) {
    // 	printf("Сообщение ошибки: %s\n", $mysqli->error);
		// 	printf("Номер ошибки: %s\n", $mysqli->errno);
		// }

		/* Закрыть соединение */
		$mysqli->close();

		return true;
	}

	public function editString($id) {
		$mysqli = $this->getConnection();

		$sql = $this->sqlEditString();
		$mysqli->query($sql);

		// $mysqi->close();

		return $mysqli->affected_rows;
	}


	public function delete($id) {}


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
