<?php

class Auth extends Base
{
  public function getUser ($login, $password){
    $table = 'users';
    $rows = 'id, login, password';
    $join = '';
    $where = "`login` = '$login'";
    $order = '';
// AND `password` = $password
    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);
    return $result;
  }

  public function input (){}

  public function output (){}
}


?>
