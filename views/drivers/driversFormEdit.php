<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/drivers/edit/<?= $id ?>" method="post">

  <label for="surname"> Фамилия: </label>
  <input type="text" name="surname" value="<?=$oneDriverName['0']['surname']?>" placeholder="" id="surname"> <br />

  <label for="first_name"> Имя: </label>
  <input type="text" name="first_name" value="<?=$oneDriverName['0']['first_name']?>" placeholder="" id="first_name"> <br />

  <label for="patronymic"> Отчество: </label>
  <input type="text" name="patronymic" value="<?=$oneDriverName['0']['patronymic']?>" placeholder="" id="patronymic"> <br />

  <label for="date_of_birth"> Дата рождения: </label>
  <input type="date" name="date_of_birth" value="<?=$oneDriverName['0']['date_of_birth']?>" placeholder="" id="date_of_birth"> <br />

  <label for="place_of_birth"> Место рождения: </label>
  <input type="text" name="place_of_birth" value="<?=$oneDriverName['0']['place_of_birth']?>" placeholder="" id="place_of_birth"> <br />

  <label for="passport"> Паспорт: </label>
  <input type="text" name="passport" value="<?=$oneDriverName['0']['passport']?>" placeholder="" id="passport"> <br />

  <label for="registration"> Регистрация: </label>
  <input type="text" name="registration" value="<?=$oneDriverName['0']['registration']?>" placeholder="" id="registration"> <br />

  <label for="drivers_license"> Водительское удостоверение: </label>
  <input type="text" name="drivers_license" value="<?=$oneDriverName['0']['drivers_license']?>" placeholder="" id="drivers_license"> <br />

  <label for="phone_1"> Телефон 1: </label>
  <input type="text" name="phone_1" value="<?=$oneDriverName['0']['phone_1']?>" placeholder="" id="phone_1"> <br />

  <label for="phone_2"> Телефон 2: </label>
  <input type="text" name="phone_2" value="<?=$oneDriverName['0']['phone_2']?>" placeholder="" id="phone_2"> <br />

  <label for="phone_3"> Телефон 3: </label>
  <input type="text" name="phone_3" value="<?=$oneDriverName['0']['phone_3']?>" placeholder="" id="phone_3"> <br />

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
