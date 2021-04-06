<?php

class AuthController extends controller
{
  /*-------------- Вход ---------------*/
  public function view() { // вместо input поставил view
    if(!empty($_POST)) {
      $auth = new Auth();

      $login = $_POST['login'];
      $password = $_POST['password'];

      //Получаем данного пользователя, если он зарегистрирован
      $authInput = $auth->getUser($login, $password);

      // var_export($authInput);
      $_SESSION['login'] = $authInput[0]['login'];
      // var_export($_SESSION['login']);
      header("Location: /");
      exit();
    } else {
      include("views/auth/authForm.php");
    }
  }

  public function output() {
    // var_dump($_SESSION['login']);
    session_destroy();
    header("Location: /");
    exit();
  }

  /*-------------- Регистрация нового пользователя ---------------*/
  //Надо ли в открытом доступе оставлять?
  // Пока что убрать защиту, чтобы делать новых пользователей
  // через phpmyadmin
  public function registration() {}



}
 ?>
