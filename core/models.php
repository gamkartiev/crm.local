<?php
class Base
{
private $db_host ="localhost";
private $db_user ="root";
private $db_pass ="root";
private $db_name ="crmTransport";

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

	public $result = array(); //нужно ли

	/*
	* Проверяет наличие таблицы при выполнении запроса
	*
	*/
	private function tableExists($table) {
		$tablesInDb = mysqli_query('SHOW TABLES FROM '.$this->db_name.' LIKE '.$table.'');
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
					return print_r('запрос $query был выполненэ'); // если запрос $query не был выполнен
				}
		} else {	// если такая таблица не существует
				return print_r("такая таблица не сущ");
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
