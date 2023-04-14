<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
</main>

  <form class="" action="/driversOtherWorks/add" method="post">
    <label> ФИО водителя
      <select name="id_drivers" required>
        <option disabled>Выберите водителя: </option>
        <option>  </option>
        <?php foreach($drivers as $a): ?>
        <option value="<?= $a['id'] ?>"> <?=$a['driver']?> </option>
        <?php endforeach; ?>
      </select>  <br /><br />
    </label>

    <label> Постановление
      <input type="text" name="sum" value=""> <br /><br />
    </label>

    <label> Дата нарушения
      <input type="date" name="date_of_work" value="">  <br /><br />
    </label>

    <label> Время нарушения
      <select class="" name="">
        <option value=""> Не выплачено </option>
        <option value=""> Выплачено </option>
      </select>
      <input type="time" name="status" value="">  <br /><br />
    </label>

    <label> Машина:
     <select name="id_cars" required>
        <option disabled>Выберите машину:</option>
        <?php
        foreach($cars as $a): ?>
        <option value="<?= $a['id'] ?>"> <?= $a['state_sign_cars'] ?></option>
        <<?php endforeach; ?>
     </select>
     </label> <br /><br />

    <label> Месяц, год удержания
      <input type="date" name="hold_date" value="">  <br /><br />
    </label>

    <label> Удержано с водителя
      <input type="text" name="withheld" value="250">  <br /><br />
    </label>

    <label> Сумма к оплате
      <input type="text" name="to_pay" value="250">  <br /><br />
    </label>

    <label> Срок оплаты
      <input type="date" name="due_date" value="">  <br /><br />
    </label>

    <label> Сумма после срока оплаты
      <input type="text" name="after_the_due_date" value="500">  <br /><br />
    </label>

    <label> Дата оформления заявки
      <input type="date" name="date_of_application" value="<?= date("Y-m-d") ?>">  <br /><br />
    </label>

    <label> Примечаение
      <input type="text" name="note" value="---">  <br /><br />
    </label>

    <label> Оплата
     <select name="status" required>
       <?php
       foreach($status as $a): ?>
        <option value="<?= $a['id'] ?>"> <?= $a['status'] ?></option>
       <?php endforeach; ?>
     </select>
    </label> <br /><br />

    <button type="submit" name="button"> Добавить </button>
  </form>


</main>

</body>
</html>
