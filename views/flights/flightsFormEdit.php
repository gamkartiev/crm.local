<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
</head>


<body>
<main>


<form action="/flights/edit/<?=$id ?>" method="post">
  <label for="place_1"> Откуда:   </label>
  <input type="text" name="place_1" value="<?=$oneFlights['0']['place_1']?>" required> <br />

  <label for="place_2"> Куда:   </label>
  <input type="text" name="place_2" value="<?=$oneFlights['0']['place_2']?>" required> <br />

  <label for="date_1"> Дата загрузки:   </label>
  <input type="date" name="date_1" value="<?=$oneFlights['0']['date_1']?>" required> <br />

  <label for="date_2"> Дата выгрузки:   </label>
  <input type="date" name="date_2" value="<?=$oneFlights['0']['date_2']?>"> <br />

  <label for="freight"> Название груза:   </label>
  <input type="text" name="freight" value="<?=$oneFlights['0']['freight']?>"> <br />

  <label for="weight"> Вес:   </label>
  <input type="number" name="weight" value="<?=$oneFlights['0']['weight']?>"> <br />

  <label for="volume"> Объем:   </label>
  <input type="number" name="volume" value="<?=$oneFlights['0']['volume']?>"> <br />

  <label for="cost"> Сумма:   </label>
  <input type="text" name="cost" value="<?=$oneFlights['0']['cost']?>"> <br />

  <label for="form_of_payment"> Форма оплаты:   </label>
  <input type="text" name="form_of_payment" value="<?=$oneFlights['0']['form_of_payment']?>" > <br />

  <label for="car"> Машина: </label>
  <select name="car" required>
    <option disabled>Выберите машину:</option>
    <?php
    foreach($cars as $a): ?>
    <option> <?= $a['state_sign_cars'] ?></option>
    <<?php endforeach; ?>
  </select>

  <label for="customers"> Компания: </label>
  <select name="customers" required>
    <option disabled>Выберите Компанию:</option>
    <?php
    foreach($customers as $a): ?>
    <option> <?= $a['short_name'] ?></option>
    <<?php endforeach; ?>
  </select>

  <label for="proxy"> Доверенность: </label>
  <input type="text" name="proxy" value="<?=$oneFlights['0']['proxy']?>" > <br />

  <label for="request"> Заявка:   </label>
  <input type="text" name="request" value="<?=$oneFlights['0']['request']?>" > <br />

  <label for="note"> Примечание:   </label>
  <input type="text" name="note" value="<?=$oneFlights['0']['note']?>"> <br />

  <button type="submit" name="button"> Отправить </button>
</form>


</main>
</body>


</html>
