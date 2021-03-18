<?php
class Route
{
  static function start() {
      //Контроллер и действие по умолчанию
      $controller_name = 'flights';
      $action_name = 'view';
      $routes = explode('/', $_SERVER['REQUEST_URI']); //смотрим на путь

      //получаем имя контролера
      if(!empty($routes[1])) {
        $controller_name = $routes[1];
      }

      //получаем имя action
      if(!empty($routes[2])) {
        $action_name = $routes[2];
      }

      //Получаем, если есть $id
      if(!empty($routes[3])){
        $id = $routes[3];
      }
      else{
        $id = ''; /*тут поменять на автомат. выбор по первой букве алфавита или пустой*/
      }

      //Подключаем файл с моделями
      $model_file = $controller_name.'models.php';
      $model_path = "models/".$model_file;
      if(file_exists($model_path)){
        include "models/".$model_file;
       }


      //Добавляем префиксы и первая буква контроллера в верхнем регистре - рекомендация PSR
      $controller_name = ucfirst($controller_name).'Controller';


      //Подключаем файл с классом контроллера
      $controller_file = strtolower($controller_name).'.php';
      $controller_path = "controllers/".$controller_file;
      if(file_exists($controller_path)) {
        include "controllers/".$controller_file;
       }
      //  else {
      //   /*Сюда нужно кинуть исключение, но пока оставляем так - упрощение */
      //     $error = "Не найден файл с контроллером ".$controller_file;
      //     Route::ErrorPage404();
      // }

      //Создаем контролер
      $controller = new $controller_name;
      $action = $action_name;

      //вызываем действие контроллера(метод)
      if(method_exists($controller, $action)) {
        $controller->$action($id);
      } else {
        //
        // $error = "Нет метода контроллера ".$controller_name;
        Route::ErrorPage404();
      }
  }

  static function ErrorPage404() {
      $routes = explode('/', $_SERVER['REQUEST_URI']);
        var_dump($routes[1]);
        var_dump($routes[2]);
      // echo $error;
    // $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    // header('HTTP/1.1 404 Not Found');
    //       header("Status: 404 Not Found");
    //       header('Location: .$host.404');
  }
}
