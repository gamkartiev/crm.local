<?php
class Parameters extends base
{

public function getDailyAllowanceParameters() {
  $table = 'daily_allowance';
  $rows = '*';
  $join = '';
  $where = '';
  $order = 'start_daily_allowance DESC, id DESC';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


//
public function getActualDailyAllowance() {
  $today = date("Y-m-d");

  $table = 'daily_allowance';
  $rows = '*';
  $join =	'';
  $where = "start_daily_allowance <='$today'";
  $order = 'id DESC LIMIT 1';
  // var_export($result);
  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


public function getInsertDailyAllowance($values) {
  $table = 'daily_allowance';
  $rows = 'daily_allowance, start_daily_allowance';

  $base = new Base();
  $base->insert($table, $values, $rows);
}


public function getEditDailyAllowance($id, $values) {
  $table = 'daily_allowance';
  $rows = array("daily_allowance", "start_daily_allowance");
  $where = "id=".(int)$id;

  $base = new Base();
  $base->update($table, $rows, $where, $values);
}


//--Параметр для ред-я суточных
public function getOneDailyAllowance($id) {
  $table = 'daily_allowance';
  $rows = '*';
  $join =	'';
  $where = '';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
// var_export($result);
  return $result;

}



public function getPremium(){
  $table = 'drivers_premium';
  $rows = '*';
  $join =	'';
  $where = '';
  $order = 'id DESC LIMIT 1';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
// var_export($result);
  return $result;
}


public function getInsertPremium($values){
  $table = 'drivers_premium';
  $rows = 'total_premium, premium, start_premium';

  $base = new Base();
  $base->insert($table, $values, $rows);
}


public function getEditPremium($id, $values) {
  $table = 'drivers_premium';
  $rows = array("total_premium", "premium");
  $where = "id=".(int)$id;

  $base = new Base();
  $base->update($table, $rows, $where, $values);
}



//в принципе, удаление этого параметра не планируется. Как и тех, которые были проставлены ранее
//но функция пусть будет, вдруг потом понадобится
public function deleteDailyAllowance($id) {
  $table = 'daily_allowance';
  $where = 'id='.(int)$id;

  $base = new Base();
  $base->delete($table, $where);
}

}
