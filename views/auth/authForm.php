<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Вход в аккаунт </title>
  </head>
  <body>

<form action="/auth/input" method="post">

    <label for="login"> Логин: </label>
  * <input type="text" name="login" id="login" required autocomplete="off"> <br />

    <label for="password"> Пароль: </label>
  * <input type="password" name="password" id="password" required autocomplete="off"> <br />

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
