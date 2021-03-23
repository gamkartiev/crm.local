<?php

class Auth extends Base
{
  public function getUser ($login){
    $table = 'users';
    $rows = 'id, login, password';
    $join = '';
    $where = "`login` = '$login'";
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);
    return $result; 
  }

  public function input (){}

  public function output (){}
}


?>
