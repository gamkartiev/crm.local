<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
</main>

<!-- Суточные -->
  <form action="/parameters/edit" method="post">
    <input type="hidden" name="daily_allowance_id" value="<?= $dailyAllowance['0']['id'] ?>">

    <label> Сумма суточных:
      <input type="number" name="daily_allowance" value="<?=$dailyAllowance['0']['daily_allowance']?>"> <br /><br />
    </label>

    <label> Дата начала начисления суточных:
      <input type="date" name="start_daily_allowance" value="<?=$dailyAllowance['0']['start_daily_allowance']?>"> <br /><br />
    </label>

<!-- Начисление премии водителям -->
  <form action="/parameters/edit/<?=$id?>" method="post">
    <input type="hidden" name="premium_id" value="<?=$premium['0']['id']?>">

    <label> Порог для начисления премии:
      <input type="number" name="total_premium" value="<?=$premium['0']['total_premium']?>"> <br /><br />
    </label>

    <label> Процент премии от зарплаты:
      <input type="number" name="premium" value="<?=$premium['0']['premium']?>"> <br /><br />
    </label>

    <label> Дата начала начисления суточных:
      <input type="date" name="start_premium" value="<?=$premium['0']['start_premium']?>"> <br /><br />
    </label>

    <button type="submit" name="button"> Добавить </button>
  </form>


</main>

</body>
</html>
