<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Редактирование чека </title>
</head>

<body>
</main>

  <form action="/checks/edit/<?= $id ?>" method="post">
    <label> ФИО водителя
      <select name="id_drivers" required>
        <option disabled> Выберите водителя: </option>
        <?php foreach($drivers as $a): ?>
        <option value="<?= $a['id'] ?>"> <?=$a['driver']?> </option>
        <?php endforeach; ?>
      </select>  <br /><br />
    </label>

    <label> Сумма чека
      <input type="text" name="sum" value="<?=$oneCheck['0']['sum']?>" required>  <br /><br />
    </label>

    <label> Дата чека
      <input type="date" name="date" value="<?=$oneCheck['0']['date']?>" required>  <br /><br />
    </label>

    <label> Пояснение
      <input type="text" name="note" value="<?=$oneCheck['0']['note']?>">  <br /><br />
    </label>

    <label> Оплата (компенсировано до ЗП или нет)
     <select name="id_status">
       <?php
       foreach($status as $a): ?>
        <option value="<?= $a['id'] ?>"> <?= $a['status'] ?></option>
       <?php endforeach; ?>
     </select>
    </label> <br /><br />

    <label> Наличие чека
     <select name="availability_of_a_check" required>
       <?php
       foreach($status_of_a_check as $a): ?>
        <option> <?= $a['status'] ?></option>
       <?php endforeach; ?>
     </select>
    </label> <br /><br />


    <button type="submit" name="button"> Добавить </button>
  </form>


</main>

</body>
</html>
