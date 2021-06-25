<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/drivers/add" method="post">
  *<label> Фамилия:
    <input type="text" name="surname" required> <br />
    </label>

  *<label> Имя:
    <input type="text" name="first_name" required> <br />
    </label>

  <label> Отчество:
   <input type="text" name="patronymic"> <br />
   </label>

  *<label> Дата рождения:
    <input type="date" name="date_of_birth" required> <br />
    </label>

  <label> Место рождения:
   <input type="text" name="place_of_birth"> <br />
   </label>

  <label> Паспорт:
   <input type="text" name="passport"> <br />
   </label>

  <label> Регистрация:
   <input type="text" name="registration"> <br />
   </label>

  <label> Водительское удостоверение:
   <input type="text" name="drivers_license"> <br />
   </label>

  <label> Телефон 1:
   <input type="text" name="phone_1"> <br />
   </label>

  <label> Телефон 2:
   <input type="text" name="phone_2"> <br />
   </label>

  <label> Телефон 3:
   <input type="text" name="phone_3"> <br />
   </label>

  <button type="submit" name="button"> Добавить </button>
</form>


  </body>
</html>
