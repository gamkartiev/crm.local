<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
</main>

<!-- Суточные -->
<form action="/parameters/add" method="post">
  <label> Сумма суточных:
    <input type="number" name="daily_allowance" value=""> <br /><br />
  </label>

  <label> Дата начала начисления суточных:
    <input type="date" name="start_daily_allowance" value="<?= date("Y-m-d") ?>">  <br /><br />
  </label>


<!-- Начисление премии водителям -->
  <label> Порог для начисления премии:
    <input type="number" name="total_premium" value=""> <br /><br />
  </label>

  <label> Процент премии от зарплаты:
    <input type="number" name="premium" value="5">  <br /><br />
  </label>

  <label> Дата начала начисления суточных:
    <input type="date" name="start_premium" value="<?= date("Y-m-d") ?>"> <br /><br />
  </label>

  <button type="submit" name="button"> Добавить </button>
</form>

</main>

</body>
</html>
