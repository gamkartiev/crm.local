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
   <input type="text" name="freight" value="груз"> <br />
   </label>

  <label> Вес: </label>
   <input type="number" name="weight" value="20"> <br />
   </label>

  <label> Объем: </label>
   <input type="number" name="volume" value="76"> <br />
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
      <option value="<?=$a['id']?>"> <?=$a['short_name']?></option>
      <<?php endforeach; ?>
   </select>
   </label>

  <label> Доверенность:
   <input type="text" name="proxy" value="1"> <br />
   </label>

  <label> Заявка:
   <input type="text" name="request" value="1"> <br />
   </label>

  <label> Примечание:
   <input type="text" name="note" value="--"> <br />
   </label>


<label> Водитель:
 <select name="driver" required>
    <option disabled>Выберите водителя:</option>
    <option>    </option>
    <?php foreach($drivers as $a): ?>
    <option> <?=$a['driver']?></option>
    <<?php endforeach; ?>
 </select>
 </label>


 <label> Оплата водителю:
  <input type="text" name="drivers_payment" value="2000"> <br />
  </label>

  <button type="submit" name="button"> Добавить </button>
</form>


</main>
</body>


</html>
