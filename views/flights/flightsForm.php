<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
</head>


<body>
<main>

<form action="/flights/add" method="post">
  <label for="place_1"> Откуда: </label>
  <input type="text" name="place_1" placeholder="место загрузки" id="place_1" required> <br />

  <label for="place_2"> Куда: </label>
  <input type="text" name="place_2" placeholder="место выгрузки" id="place_2" required> <br />

  <label for="date_1"> Дата загрузки: </label>
  <input type="date" name="date_1" value="" id="date_1" required> <br />

  <label for="date_2"> Дата выгрузки: </label>
  <input type="date" name="date_2" value="" id="date_2" required> <br />

  <label for="freight"> Название груза: </label>
  <input type="text" name="freight" placeholder="название груза" id="freight"> <br />

  <label for="weight"> Вес: </label>
  <input type="number" name="weight" placeholder="Вес" id="weight"> <br />

  <label for="volume"> Объем: </label>
  <input type="number" name="volume" placeholder="Объем" id="volume"> <br />

  <label for="cost"> Сумма: </label>
  <input type="text" name="cost" placeholder="стоимость перевозки" id="cost"> <br />

  <label for="form_of_payment"> Форма оплаты: </label>
  <input type="text" name="form_of_payment" value="с НДС" id="form_of_payment"> <br />

  <label for="car"> Машина: </label>
  <select name="car" required>
    <option disabled>Выберите машину:</option>
    <option>   </option>
    <?php
    foreach($cars as $a): ?>
    <option value="<?=$a['state_sign_cars']?>"> <?=$a['state_sign_cars']?></option>
    <<?php endforeach; ?>
  </select>

  <label for="customers"> Компания: </label>
  <select name="customers" required>
    <option disabled>Выберите Компанию:</option>
    <option>    </option>
    <?php foreach($customers as $a): ?>
    <option> <?=$a['short_name']?></option>
    <<?php endforeach; ?>
  </select>

  <label for="proxy"> Доверенность: </label>
  <input type="text" name="proxy" id="proxy"> <br />

  <label for="request"> Заявка: </label>
  <input type="text" name="request" id="request"> <br />

  <label for="note"> Примечание: </label>
  <input type="text" name="note" id="note"> <br />

  <button type="submit" name="button"> Добавить </button>
</form>


</main>
</body>


</html>
