<?php

class AuthController extends controller
{
  /*-------------- Вход ---------------*/
  public function input() {
    if(!empty($_POST)) {
      $auth = new Auth();

      $login = $_POST['login'];
      $password = $_POST['password'];

      //Получаем данного пользователя, если он зарегистрирован
      $authInput = $auth->getUser($login);
     // var_export($authInput);
      $_SESSION['login'] = "login";

      header("Location: /");
      exit();
    } else {
      include("views/auth/authForm.php");
    }
  }



  /*-------------- Регистрация нового пользователя ---------------*/
  //Надо ли в открытом доступе оставлять?
  // Пока что убрать защиту, чтобы делать новых пользователей
  // через phpmyadmin
  public function registration() {}

  public function output() {
    unset($_SESSION['login']);
    session_destroy();
    header("Location: /");
    exit();
  }

}
 ?>
