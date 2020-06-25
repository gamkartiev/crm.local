<?php

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
