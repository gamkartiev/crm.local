<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/drivers/add" method="post">

  * <label for="surname"> Фамилия: </label>
  <input type="text" name="surname" id="surname" required> <br />

  * <label for="first_name"> Имя: </label>
  <input type="text" name="first_name" id="first_name" required> <br />

  <label for="patronymic"> Отчество: </label>
  <input type="text" name="patronymic" id="patronymic"> <br />

  * <label for="date_of_birth"> Дата рождения: </label>
  <input type="date" name="date_of_birth" id="date_of_birth" required> <br />

  <label for="place_of_birth"> Место рождения: </label>
  <input type="text" name="place_of_birth" id="place_of_birth"> <br />

  <label for="passport"> Паспорт: </label>
  <input type="text" name="passport" id="passport"> <br />

  <label for="registration"> Регистрация: </label>
  <input type="text" name="registration" id="registration"> <br />

  <label for="drivers_license"> Водительское удостоверение: </label>
  <input type="text" name="drivers_license" id="drivers_license"> <br />

  <label for="phone_1"> Телефон 1: </label>
  <input type="text" name="phone_1" id="phone_1"> <br />

  <label for="phone_2"> Телефон 2: </label>
  <input type="text" name="phone_2" id="phone_2"> <br />

  <label for="phone_3"> Телефон 3: </label>
  <input type="text" name="phone_3" id="phone_3"> <br />

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
