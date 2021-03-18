<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/flights/edit" method="post">
  <input type="hidden" name="action" value="addNewFlight"> <!--Этот пункт можно убрать -->
  <label for="place_1"> Откуда: </label>
    <input type="text" name="place_1" value="<?=$oneFlights['0']['place_1']?>" placeholder="место загрузки" id="place_1"> <br />

  <label for="place_2"> Куда: </label>
    <input type="text" name="place_2" value="<?=$oneFlights['0']['place_2']?>" placeholder="место выгрузки" id="place_2"> <br />

  <label for="date_1"> Дата загрузки: </label>
    <input type="date" name="date_1" value="<?=$oneFlights['0']['date_1']?>" id="date_1"> <br />

  <label for="date_2"> Дата выгрузки: </label>
    <input type="date" name="date_2" value="<?=$oneFlights['0']['date_2']?>" id="date_2"> <br />

  <label for="freight"> Название груза: </label>
    <input type="text" name="freight" value="<?=$oneFlights['0']['freight']?>" placeholder="название груза" id="freight"> <br />

  <label for="weight"> Вес: </label>
    <input type="number" name="weight" value="<?=$oneFlights['0']['weight']?>" placeholder="Вес" id="weight"> <br />

  <label for="volume"> Объем: </label>
    <input type="number" name="volume" value="<?=$oneFlights['0']['volume']?>" placeholder="Объем" id="volume"> <br />

  <label for="cost"> Сумма: </label>
    <input type="text" name="cost" value="<?=$oneFlights['0']['cost']?>" placeholder="стоимость перевозки" id="cost"> <br />

  <label for="form_of_payment"> Форма оплаты: </label>
    <input type="text" name="form_of_payment" value="<?=$oneFlights['0']['form_of_payment']?>" id="form_of_payment"> <br />

  <label for="car"> Машина: </label>
    <select class="" name="car">
      <option disabled>Выберите машину:</option>
      <?php
      foreach($cars as $a): ?>
        <option value="<?=$oneFlights['0']['car']?>"> <?=$a['state_sign_cars']?></option>
      <<?php endforeach; ?>
    </select>

  <label for="customers"> Компания: </label>
    <select class="" name="customers">
      <option disabled>Выберите Компанию:</option>
      <?php
      foreach($customers as $a): ?>
        <option value="<?=$oneFlights['0']['customers'] ?>"> <?=$a['short_name']?></option>
      <<?php endforeach; ?>
    </select>


  <label for="proxy"> Доверенность: </label>
    <input type="text" name="proxy" value="<?=$oneFlights['0']['proxy']?>" id="proxy"> <br />

  <label for="request"> Заявка: </label>
    <input type="text" name="request" value="<?=$oneFlights['0']['request']?>" id="request"> <br />

  <label for="note"> Примечание: </label>
    <input type="text" name="note" value="<?=$oneFlights['0']['note']?>" id="note"> <br />

<button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
