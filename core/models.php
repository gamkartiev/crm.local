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
	public function select($table, $rows, $join, $where, $order) {
		$mysqli = $this->getConnection();

		$q = 'SELECT '.$rows.' FROM '.$table;
		if($join != null)
			$q .= $join;
		if($where != null)
			$q .=' WHERE '.$where;
		if($order !=null)
			$q .= ' ORDER BY '.$order;
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
				// var_dump($result);
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
	public function insert($table, $values, $rows) {
		$mysqli = $this->getConnection();

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
			$ins = $mysqli->query($insert);
			if($ins) {
				return true;
			} else {
				return false;
			}
		}
	}


	public function update($table, $rows, $where, $values) {
		$mysqli = $this->getConnection();

		if($this->tableExists($table)) {
			//Parse the where VALUES/Parse the where values
			// even values (including 0) contain the where rows/even values (including 0) contain the where rows
			// odd values contain the clauses for the row/нечетные значения содержат предложения для строки
			// for($i=0; $i < count($where); $i++) {
			// 	if($i%2 != 0) {
			// 		if(is_string($where[$i])) {
			// 			if(($i+1) != null)
			// 					$where[$i] = '"'.$where[$i].'"AND';
			// 			else
			// 					$where[$i] = '"'.$where[$i].'"';
			// 		}
			// 	}
			// }
			// $where = implode($condition, $where);
			$update = 'UPDATE '.$table.' SET ';
			for ($i=0; $i < count($rows); $i++) {
				if(is_string($values[$i])) {
					$update .= $rows[$i].'="'.$values[$i].'"';
			} else {
					$update .= $rows[$i].'='.$values[$i];
			}
				if($i != count($rows)-1) {
				$update .= ', ';
			}

			}
			// var_export($update);
			// $keys = array_keys($rows);
			// for($i=0; $i < count($rows); $i++) {
			// 	if(is_string($rows[$keys[$i]])) {
			// 		$update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
			// 	} else {
			// 		$update .= $keys[$i].'='.$rows[$keys[$i]];
			// 	}
			// 	//Parse to add commas / Разобрать, чтобы добавить запятые
			// 	if($i != count($rows)-1) {
			// 		$update .= ',';
			// 	}
			// }
			$update .= ' WHERE '.$where;
			$query = $mysqli->query($update);
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
	public function delete($table, $where) {
		$mysqli = $this->getConnection();

		if($this->tableExists($table)) {
			if($where == null) {
				$delete = 'DELETE '.$table;
			} else {
				$delete = 'DELETE FROM '.$table.' WHERE '.$where;
			}
			$del = $mysqli->query($delete);
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
