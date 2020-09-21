<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/flights/add" method="post">
  <input type="hidden" name="action" value="addNewFlight"> <!--Этот пункт можно убрать -->
  <label for="place_1"> Откуда: </label>
    <input type="text" name="place_1" placeholder="место загрузки" id="place_1"> <br />

  <label for="place_2"> Куда: </label>
    <input type="text" name="place_2" placeholder="место выгрузки" id="place_2"> <br />

  <label for="date_1"> Дата загрузки: </label>
    <input type="date" name="date_1" value="" id="date_1"> <br />

  <label for="date_2"> Дата выгрузки: </label>
    <input type="date" name="date_2" value="" id="date_2"> <br />

  <label for="freight"> Название груза: </label>
    <input type="text" name="freight" placeholder="название груза" id="freight"> <br />

  <label for="weight"> Вес: </label>
    <input type="number" name="weight" placeholder="Вес" id="weight"> <br />

  <label for="volume"> Объем: </label>
    <input type="number" name="volume" placeholder="Объем" id="volume"> <br />

  <label for="cost"> Сумма: </label>
    <input type="text" name="cost" placeholder="стоимость перевозки" id="cost"> <br />

  <label for="formOfPayment"> Форма оплаты: </label>
    <input type="text" name="form_of_payment" value="с НДС" id="formOfPayment"> <br />

  <!-- <label for=""> Условия оплаты </label>
    <input type="text" name="" value="" id=""> -->

  <label for="state_sign_cars"> Тягач: </label>
    <select class="" name="state_sign_cars">
      <option disabled>Выберите машину:</option>
      <?php
      foreach($cars as $a): ?>
        <option value="<?=$a['id']?>"> <?=$a['state_sign_cars']?></option>
      <<?php endforeach; ?>
    </select>

  <label for="customers"> Компания: </label>
    <select class="" name="customers">
      <option disabled>Выберите Компанию:</option>
      <?php
      foreach($customers as $a): ?>
        <option value="<?=$a['id']?>"> <?=$a['short_name']?></option>
      <<?php endforeach; ?>
    </select>

  <!-- <label for=""> Логист: </label>
    <input type="text" name="" value="" id=""> <br /> -->

  <label for=""> Доверенность: </label>
    <input type="text" name="proxy" value="Доверенность №" id="proxy"> <br />

  <label for="request"> Заявка: </label>
    <input type="text" name="request" value="Заявка №" id="request"> <br />

  <label for=""> Примечание: </label>
    <input type="text" name="note" value="Без примечания" id="note"> <br />

<button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
