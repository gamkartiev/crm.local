<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Водители </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

<section>
	<p> Сумма суточных: <?php echo $parameters['daily_allowance']; ?> </p>
	<p> Дата начала начисления суточных: <?php echo $parameters['start_daily_allowance'] ?> </p>
  <br /> <br />
</section>

<section>
	<p> Если водитель заработал больше,чем
		   <?php echo $parameters['total_premium'] ?> рублей в месяц</p>
	<p> Начисляет премию от суммы в размере(проценты): <?php echo $parameters['premium']; ?></p>
	<p> Дата начала применения суточных: <?php echo $parameters['start_premium'] ?> </p>

</section>
<br /> <br />

<section>
	<p> День месяца, до которой высчитывается параметры за этот месяц: </p>
	<p> До 15 числа следующего месяца </p>

</section>

	<p><a href="/parameters/edit" class="bottom-new"> Изменить параметры </a></p>

</main>

</body>
</html>
