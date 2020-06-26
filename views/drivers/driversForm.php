<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/drivers/add" method="post">

  <label for="surname"> Фамилия: </label>
  <input type="text" name="surname" placeholder="" id="surname"> <br />

  <label for="first_name"> Имя: </label>
  <input type="text" name="first_name" value="" id="first_name"> <br />

  <label for="patronymic"> Отчество: </label>
  <input type="text" name="patronymic" value="" id="patronymic"> <br />

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
