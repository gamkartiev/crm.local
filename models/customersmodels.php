<?php

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
