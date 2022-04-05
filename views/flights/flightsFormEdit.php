<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
</head>


<body>
<main>


<form action="/flights/edit/<?=$id ?>" method="post">
  <label> Откуда:
   <input type="text" name="place_1" value="<?=$oneFlights['0']['place_1']?>" required> <br />
   </label>

  <label> Куда:
   <input type="text" name="place_2" value="<?=$oneFlights['0']['place_2']?>" required> <br />
   </label>

  <label> Дата загрузки:
   <input type="date" name="date_1" value="<?=$oneFlights['0']['date_1']?>" required> <br />
   </label>

  <label> Дата выгрузки:
   <input type="date" name="date_2" value="<?=$oneFlights['0']['date_2']?>"> <br />
   </label>

  <label> Название груза:
   <input type="text" name="freight" value="<?=$oneFlights['0']['freight']?>"> <br />
   </label>

  <label> Вес:
   <input type="number" name="weight" value="<?=$oneFlights['0']['weight']?>"> <br />
   </label>

  <label> Объем:
   <input type="number" name="volume" value="<?=$oneFlights['0']['volume']?>"> <br />
   </label>

  <label> Сумма:
   <input type="text" name="cost" value="<?=$oneFlights['0']['cost']?>"> <br />
   </label>

  <label> Форма оплаты:
   <input type="text" name="form_of_payment" value="<?=$oneFlights['0']['form_of_payment']?>" > <br />
   </label>

  <label> Машина:
   <select name="car" required>
      <option disabled>Выберите машину:</option>
      <?php
      foreach($cars as $a): ?>
      <option> <?= $a['state_sign_cars'] ?></option>
      <<?php endforeach; ?>
   </select>
   </label>

  <label> Компания:
   <select name="customers" required>
      <option disabled>Выберите Компанию:</option>
      <?php
      foreach($customers as $a): ?>
      <option value="<?= $a['id']?>"> <?= $a['short_name'] ?> </option>
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

 <label> Водитель:
  <select name="driver" required>
     <option disabled>Выберите водителя:</option>
     <?php
     foreach($drivers as $a): ?>
     <option> <?= $a['driver'] ?></option>
     <?php endforeach; ?>
  </select>
  </label>

 <label> Оплата водителю:
  <input type="text" name="drivers_payment" value="<?=$oneFlights['0']['drivers_payment']?>"> <br />
  </label>

  <button type="submit" name="button"> Отправить </button>
</form>


</main>
</body>


</html>
