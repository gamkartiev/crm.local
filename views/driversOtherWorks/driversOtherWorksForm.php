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


    <label> Оплата
     <select name="status" required>
       <?php
       foreach($status as $a): ?>
        <option value="<?= $a['id'] ?>"> <?= $a['status'] ?></option>
       <?php endforeach; ?>
     </select>
    </label> <br /><br />


    <label> Примечаение
      <input type="text" name="note" value="---">  <br /><br />
    </label>



    <button type="submit" name="button"> Добавить </button>
  </form>


</main>

</body>
</html>
