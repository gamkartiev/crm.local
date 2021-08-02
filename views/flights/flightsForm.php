<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
</head>


<body>
<main>

<form action="/flights/add" method="post">
  <label> Откуда:
   <input type="text" name="place_1" required> <br />
   </label>

  <label> Куда: </label>
   <input type="text" name="place_2" required> <br />
   </label>

  <label> Дата загрузки: </label>
   <input type="date" name="date_1" required> <br />
   </label>

  <label> Дата выгрузки: </label>
   <input type="date" name="date_2" required> <br />
   </label>

  <label> Название груза: </label>
   <input type="text" name="freight"> <br />
   </label>

  <label> Вес: </label>
   <input type="number" name="weight"> <br />
   </label>

  <label> Объем: </label>
   <input type="number" name="volume"> <br />
   </label>

  <label> Сумма: </label>
   <input type="text" name="cost"> <br />
   </label>

  <label> Форма оплаты: </label>
   <input type="text" name="form_of_payment" value="с НДС"> <br />
   </label>

  <label> Машина:
   <select name="car" required>
      <option disabled>Выберите машину:</option>
      <option>   </option>
      <?php
      foreach($cars as $a): ?>
      <option value="<?=$a['state_sign_cars']?>"> <?=$a['state_sign_cars']?></option>
      <<?php endforeach; ?>
   </select>
   </label>

  <label> Компания:
   <select name="customers" required>
      <option disabled>Выберите Компанию:</option>
      <option>    </option>
      <?php foreach($customers as $a): ?>
      <option> <?=$a['short_name']?></option>
      <<?php endforeach; ?>
   </select>
   </label>

  <label> Доверенность:
   <input type="text" name="proxy"> <br />
   </label>

  <label> Заявка:
   <input type="text" name="request"> <br />
   </label>

  <label> Примечание:
   <input type="text" name="note"> <br />
   </label>

 <label> Оплата водителю:
  <input type="text" name="drivers_payment"> <br />
  </label>

  <button type="submit" name="button"> Добавить </button>
</form>


</main>
</body>


</html>
