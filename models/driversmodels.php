<?php

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
