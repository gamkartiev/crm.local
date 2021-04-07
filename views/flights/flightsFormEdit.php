<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/flights/edit" method="post">
  <!-- <input type="hidden" name="action" value="addNewFlight"   //Этот пункт можно убрать -->
  <label> Откуда:
    <input type="text" name="place_1" value="<?=$oneFlights['0']['place_1']?>" placeholder="место загрузки"> <br />
  </label>

  <label> Куда:
    <input type="text" name="place_2" value="<?=$oneFlights['0']['place_2']?>" placeholder="место выгрузки"> <br />
  </label>

  <label> Дата загрузки:
    <input type="date" name="date_1" value="<?=$oneFlights['0']['date_1']?>"> <br />
  </label>

  <label> Дата выгрузки:
    <input type="date" name="date_2" value="<?=$oneFlights['0']['date_2']?>"> <br />
  </label>

  <label> Название груза:
    <input type="text" name="freight" value="<?=$oneFlights['0']['freight']?>" placeholder="название груза"> <br />
  </label>

  <label> Вес:
    <input type="number" name="weight" value="<?=$oneFlights['0']['weight']?>" placeholder="Вес"> <br />
  </label>

  <label> Объем:
    <input type="number" name="volume" value="<?=$oneFlights['0']['volume']?>" placeholder="Объем" > <br />
  </label>

  <label> Сумма:
    <input type="text" name="cost" value="<?=$oneFlights['0']['cost']?>" placeholder="стоимость перевозки" > <br />
  </label>

  <label> Форма оплаты:
    <input type="text" name="form_of_payment" value="<?=$oneFlights['0']['form_of_payment']?>" > <br />
  </label>

  <label> Машина:
    <select name="car">
      <option disabled>Выберите машину:</option>
      <?php
      foreach($cars as $a): ?>
        <option value="<?=$oneFlights['0']['car']?>"> <?=$a['state_sign_cars']?></option>
      <<?php endforeach; ?>
    </select>
  </label>

  <label> Компания:
    <select name="customers">
      <option disabled>Выберите Компанию:</option>
      <?php
      foreach($customers as $a): ?>
        <option value="<?=$oneFlights['0']['customers']?>"> <?=$a['short_name']?></option>
      <<?php endforeach; ?>
    </select>
  </label>

  <label> Доверенность:
    <input type="text" name="proxy" value="<?=$oneFlights['0']['proxy']?>" > <br />
  </label>

  <label> Заявка:
    <input type="text" name="request" value="<?=$oneFlights['0']['request']?>" > <br />
  </label>

  <label> Примечание:
    <input type="text" name="note" value="<?=$oneFlights['0']['note']?>"> <br />
  </label>

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
