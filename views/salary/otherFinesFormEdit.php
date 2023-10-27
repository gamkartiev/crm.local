<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
</main>

<form action="/salary/edit_other_fines/<?=$id?>" method="post">

  <label> ФИО водителя
  <select name="id_drivers" required>
      <option disabled> Выберите водителя: </option>
      <?php foreach($drivers as $a): ?>
      <option value="<?= $a['id'] ?>"> <?=$a['driver']?> </option>
      <?php endforeach; ?>
  </select>  <br /><br />
  </label>

  <label> Сумма штрафа
    <input type="text" name="sum" value="<?=$oneSelect['0']['sum'] ?>"> <br /><br />
  </label>

  <label> Дата прочих работ
    <input type="date" name="date" value="<?=$oneSelect['0']['date'] ?>">  <br /><br />
  </label>

  <label> Примечаение
    <input type="text" name="note" value="<?=$oneSelect['0']['note'] ?>">  <br /><br />
  </label>


  <button type="submit" name="button"> Добавить </button>
</form>


</main>

</body>
</html>
