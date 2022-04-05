<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/drivers/edit/<?= $id ?>" method="post">
  <label> Фамилия:
   <input type="text" name="driver" value="<?=$oneDriverName['0']['driver']?>"> <br />
   </label>

  <label> Дата рождения:
   <input type="date" name="date_of_birth" value="<?=$oneDriverName['0']['date_of_birth']?>"> <br />
   </label>

  <label> Место рождения:
   <input type="text" name="place_of_birth" value="<?=$oneDriverName['0']['place_of_birth']?>"> <br />
   </label>

  <label> Паспорт:
   <input type="text" name="passport" value="<?=$oneDriverName['0']['passport']?>"> <br />
   </label>

  <label> Регистрация:
   <input type="text" name="registration" value="<?=$oneDriverName['0']['registration']?>"> <br />
   </label>

  <label> Водительское удостоверение:
   <input type="text" name="drivers_license" value="<?=$oneDriverName['0']['drivers_license']?>"> <br />
   </label>

  <label> Телефон 1:
   <input type="text" name="phone_1" value="<?=$oneDriverName['0']['phone_1']?>"> <br />
   </label>

  <label> Телефон 2:
   <input type="text" name="phone_2" value="<?=$oneDriverName['0']['phone_2']?>"> <br />
   </label>

  <label> Телефон 3:
   <input type="text" name="phone_3" value="<?=$oneDriverName['0']['phone_3']?>"> <br />
   </label>

  <button type="submit" name="button"> Отправить </button>
</form>


  </body>
</html>
