<?php
class Route
{
  static function start() {
      //Контроллер и действие по умолчанию
      $controller_name = 'flights'; //controller по умолчанию
      $action_name = 'view';  //action по умолчанию
      $routes = explode('/', $_SERVER['REQUEST_URI']); //смотрим на путь

      //получаем имя контролера
      if(!empty($routes[1])) {
        $controller_name = $routes[1];
      }

      //получаем имя action
      if(!empty($routes[2])) {
        $action_name = $routes[2];
      }

      //Добавляем префиксы, а также первая буква контролера в верхнем регистре.
      $controller_name = ucfirst($controller_name).'Controller';

      //Создаем контролер
      $controller = new $controller_name;
      $action = $action_name;


      //вызываем действие контролера(метод)
      if(method_exists($controller, $action)) {
        $controller->$action();
      } else {
        //
        Route::ErrorPage404();
      }
  }

  function ErrorPage404() {
      $routes = explode('/', $_SERVER['REQUEST_URI']);
      var_dump($routes[1]);
      var_dump($routes[2]);
    // $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    // header('HTTP/1.1 404 Not Found');
    //       header("Status: 404 Not Found");
    //       header('Location: .$host.404');
  }
}
