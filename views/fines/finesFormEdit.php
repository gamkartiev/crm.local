<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
</main>

  <form class="" action="/fines/edit/<?= $id ?>" method="post">
    <label> ФИО водителя
      <select name="driver" required>
        <option disabled>Выберите водителя: </option>
        <?php foreach($drivers as $a): ?>
        <option> <?=$a['driver']?> </option>
        <?php endforeach; ?>
      </select>  <br /><br />
    </label>

    <label> Постановление
      <input type="text" name="decree" value="<?=$oneFine['0']['decree']?>"> <br /><br />
    </label>

    <label> Дата нарушения
      <input type="date" name="date_of_violation" value="<?=$oneFine['0']['date_of_violation']?>"> <br /><br />
    </label>

    <label> Время нарушения
      <input type="time" name="time_of_violation" value="<?=$oneFine['0']['time_of_violation']?>"> <br /><br />
    </label>

    <label> Машина:
     <select name="car" required>
        <option disabled>Выберите машину:</option>
        <?php
        foreach($cars as $a): ?>
        <option> <?= $a['state_sign_cars'] ?></option>
        <<?php endforeach; ?>
     </select>
     </label> <br /><br />


    <label> Месяц, год удержания
      <input type="date" name="hold_date" value="<?=$oneFine['0']['hold_date']?>"> <br /><br />
    </label>

    <label> Удержано с водителя
      <input type="text" name="withheld" value="<?=$oneFine['0']['withheld']?>"> <br /><br />
    </label>

    <label> Сумма к оплате
      <input type="text" name="to_pay" value="<?=$oneFine['0']['to_pay']?>"> <br /><br />
    </label>

    <label> Срок оплаты
      <input type="date" name="due_date" value="<?=$oneFine['0']['due_date']?>"> <br /><br />
    </label>

    <label> Сумма после срока оплаты
      <input type="text" name="after_the_due_date" value="<?=$oneFine['0']['after_the_due_date']?>"> <br /><br />
    </label>

    <label> Дата оформления заявки
      <input type="date" name="date_of_application" value="<?=$oneFine['0']['date_of_application']?>"> <br /><br />
    </label>

    <label> Примечаение
      <input type="text" name="note" value="<?=$oneFine['0']['note']?>"> <br /><br />
    </label>

    <label> Оплата
      <input type="text" name="status" value="<?=$oneFine['0']['status']?>"> <br /><br />
    </label>

    <button type="submit" name="button"> Добавить </button>
  </form>


</main>

</body>
</html>
