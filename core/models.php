<?php
class Base
{
private $db_host = "localhost";
private $db_user = "root";
private $db_pass = "root";
private $db_name = "crmTransport";
protected $connection;
	/*
	*	Содиеняемся с бд. Разрешено только одно соединение
	*/

	protected function getConnection() {
		if($this->connection !==null) {
			return $this->connection;
		}

		$this->connection = $this->connect();
		return $this->connection;
	}

	protected function connect() {
		$connect = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		return $connect;
		}




	//Тут результаты запросы от Select()
	// public $result = array(); //нужно ли



	/* Проверяет наличие таблицы при выполнении запроса */
	private function tableExists($table) {
		$mysqli = $this->getConnection();
		$tablesInDb = $mysqli->query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
		// var_dump($tablesInDb);
		if($tablesInDb) {
			if($tablesInDb->num_rows == 1) {
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
	public function select($table, $rows, $where, $order) {
		$mysqli = $this->getConnection();

		$q = 'SELECT '.$rows.' FROM '.$table;
		if($where != null)
			$q .=' WHERE '.$where;
		if($order !=null)
			$q .= ' ORDER BY '.$order;

			// var_dump($table);
			// var_dump($q);

		if($this->tableExists($table)) {
			$query = $mysqli->query($q);

			if($query)
			{
				$numRows = $query->num_rows;
				$result = array();

				for($i=0; $i<$numRows; $i++) {
					$row = $query->fetch_assoc();
					$result[] = $row;

				}
			return $result;
			}
		}	return print_r("такая таблица не существует! models->function select");
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
	public function insert($table, $values, $rows = null) {
		if($this->tableExists($table)) {
			$insert = 'INSERT INTO '.$table;
			if($rows != null) {
				$insert .=' ('.$rows.')';
			}
			for($i=0; $i < count($values); $i++) {
				if(is_string($values[$i]))
					$values[$i] = '"'.$values[$i].'"';
			}
			$values = implode(',', $values);
			$insert .= ' VALUES ('.$values.')';
			$ins = mysqli_query($insert);
			if($ins) {
				return true;
			} else {
				return false;
			}
		}
	}


	public function update($table, $rows, $where, $condition) {
		if($this->tableExists($table)) {
			//Parse the where VALUES/Parse the where values
			// even values (including 0) contain the where rows/even values (including 0) contain the where rows
			// odd values contain the clauses for the row/нечетные значения содержат предложения для строки
			for($i=0; $i < count($where); $i++) {
				if($i%2 != 0) {
					if(is_string($where[$i])) {
						if(($i+1) != null)
								$where[$i] = '"'.$where[$i].'"AND';
						else
								$where[$i] = '"'.$where[$i].'"';
					}
				}
			}
			$where = implode($condition, $where);
			$update = 'UPDATE '.$table.' SET ';
			$keys = array_keys($rows);
			for($i=0; $i < count($rows); $i++) {
				if(is_string($rows[$keys[$i]])) {
					$update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
				} else {
					$update .= $keys[$i].'='.$rows[$keys[$i]];
				}
				//Parse to add commas / Разобрать, чтобы добавить запятые
				if($i != coun($rows)-1) {
					$update .= ',';
				}
			}
			$update .= ' WHERE '.$where;
			$query = mysqli_query($update);
			if($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/*
	* Удаляем таблицу или записи удовлетворяющие условию
	* Требуемые: таблица (наименование таблицы)
	* Опционально: where (условие [column = value]), передаем строкой, например, 'id=4'
	*/
	public function delete($table, $where = null) {
		if($this->tableExists($table)) {
			if($where == null) {
				$delete = 'DELETE '.$table;
			} else {
				$delete = 'DELETE FROM '.$table.' WHERE '.$where;
			}
			$del = mysqli_query($delete);
			if($del) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}


// class DbConnect
// {
// 	private $connection;
// 	private $serverName;
// 	private $userName;
// 	private $password;
// 	private $dbName;
//
	// protected function getConnection() {
	// 	if($this->connection !==null) {
	// 		return $this->connection;
	// 	}
	//
	// 	$this->connection = $this->connect();
	// 	return $this->connection;
	// }
	//
	// protected function connect() {
	// 	$this->serverName = 'localhost';
	// 	$this->userName = 'root';
	// 	$this->password = 'root';
	// 	$this->dbName = 'crmTransport';
	//
	// 	$connect = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
	// 	return $connect;
	// 	}
// }



/*****************---------------*****************/
/*****************---------------*****************/
// class Base extends DbConnect
// {
// 	//вывод всего
// 	public function getAllString() {
// 		$sql = $this->sqlGetAllString();
// 		$result = $this->getConnection()->query($sql);
//
// 		$numRows = $result->num_rows;
// 		$string = array();
//
// 		for($i=0; $i<$numRows; $i++) {
// 			$row = $result->fetch_assoc();
// 			$string[] = $row;
// 		}
// 		return $string;
// 	}
//
//
//
// 	public function getOneString($id) {
// 		$sql = $this->sqlGetOneString($id);
//
// 		$result = $this->getConnection()->query($sql);
// 		$getOneString[] = $result->fetch_assoc();
//
// 		return $getOneString;
// 	}
//
//
//
// 	public function createString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note) {
// 		$mysqli = $this->getConnection();
//
// 		$sql = $this->sqlCreateString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note);
// 		$mysqli->query($sql);
//
// 		/*проверяем соединение*/
// 		if($mysqli->connect_errno) {
// 			printf("Соединение не удалось: %s\n",$mysqli->connect_error);
// 			exit();
// 		}
//
// 		/* Закрыть соединение */
// 		$mysqli->close();
// 		return true;
// 	}
//
//
//
// 	public function editString($id) {
// 		$mysqli = $this->getConnection();
//
// 		$sql = $this->sqlEditString();
// 		$mysqli->query($sql);
//
// 		return $mysqli->affected_rows;
// 	}
//
//
//
// 	public function delete($id) {}
//
//
// }

// /* Проверяет переменную соединения на существования	*/
// public function disconnect() {
// 	if($this->con) {
// 		if(mysqli_close()) {
// 			$this->con = false;
// 			return true; //задает переменной $con=false и возвращает true
// 		} else {
// 			return false; //возвращает false, если mysqli_close не прошло
// 		  }
// 	}
// }
