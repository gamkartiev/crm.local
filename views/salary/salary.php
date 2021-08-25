<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Водители </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
  <link rel="stylesheet" type="text/css" href="/views/css/salary.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

	<section class="to_list">
		Год:
		<?php foreach($allSalaryMonth as $a): ?>
			 <a href="/salary/view/<?=$a?>"> <?php echo $a ?> </a>
		<?php endforeach ?>

		<?php
		// $echo = strtotime($a);
		// $echo_2 = strtotime($a[1]);
		// var_export($echo_2);
		// echo ("/n");
		// $date = date("d:m:y", $echo_2);
		// var_export($date);
		?>

	</section>

<table width="95%" border="1">
		<tr>
			<td colspan="21"> Июль </td>
		</tr>
		<tr>
			<td rowspan="2"> <b> Водители </b> </td>
			<td colspan="3"> <b> Расчет оплаты за рейс </b> </td>
			<td colspan="4"> <b> ПРР </b> </td>
			<td colspan="4"> <b> Прочие работы </b> </td>
			<td rowspan="2"> <b> Моб. связь </b> </td>
			<td colspan="3"> <b> Штрафы </b> </td>
			<td colspan="2"> <b> Чеки </b> </td>
			<td rowspan="2"> <b> ИТОГО к доплате (чеки не учитываются) </b> </td>
			<td rowspan="2"> <b> Итоговый доход (чеки не учит-ся и не учит-ся выплач-е ПРР) </b> </td>
			<td rowspan="2"> <b> ИТОГО к доплате (чеки учит-ся) </b> </td>
		</tr>
		<tr>
			<td> <b> Зар. плата </b> </td>
			<td> <b> Премия </b> </td>
			<td> <b> Премия + ЗП </b> </td>
			<td> <b> ПРР </b> </td>
			<td> <b> ПРР, выпл-е </b> </td>
			<td> <b> Даты выплат ПРР </b> </td>
			<td> <b> Расчет доплаты/ вычета ПРР </b> </td>
			<td> <b> Прочие работы </b> </td>
			<td> <b> Прочие работы, выпл-е </b> </td>
			<td> <b> Расчет доплаты за проч. работы </b> </td>
			<td> <b> Прим-е </b> </td>
			<td> <b> Штрафы ГИБДД </b> </td>
			<td> <b> Проч. штрафы </b> </td>
			<td> <b> Прим-е </b> </td>
			<td> <b> Комп. чеков </b> </td>
			<td> <b> Прим-е </b> </td>
		</tr>
		<tr>
			<td> Иванов </td>
			<td> 35000 </td>
			<td> 0% </td>
			<td> 35 000 </td>
			<td> 19600 </td>
			<td> 19600 </td>
			<td> 07.07.2021, 14.07.2021, 21.07.2021, 28.07.2021 </td>
			<td> 0 </td>
			<td> - </td>
			<td> 4500 </td>
			<td> 3 дня ремонт </td>
			<td> - </td>
			<td> 600 </td>
			<td> 2000 </td>
			<td> - </td>
			<td> - </td>
			<td> 0 </td>
			<td> - </td>
			<td> 47400 </td>
			<td> 68000 </td>
			<td> 47400 </td>
		</tr>
		<tr>
			<td> Акушеров </td>
			<td> 35000 </td>
			<td> 0% </td>
			<td> 35 000 </td>
			<td> 19600 </td>
			<td> 19600 </td>
			<td> 07.07.2021, 14.07.2021, 21.07.2021, 28.07.2021 </td>
			<td> 0 </td>
			<td> - </td>
			<td> 4500 </td>
			<td> 3 дня ремонт </td>
			<td> - </td>
			<td> 600 </td>
			<td> 2000 </td>
			<td> - </td>
			<td> - </td>
			<td> 0 </td>
			<td> - </td>
			<td> 47400 </td>
			<td> 68000 </td>
			<td> 47400 </td>
		</tr>
		<tr>
			<td> Кочерыжкин </td>
			<td> 35000 </td>
			<td> 0% </td>
			<td> 35 000 </td>
			<td> 19600 </td>
			<td> 19600 </td>
			<td> 07.07.2021, 14.07.2021, 21.07.2021, 28.07.2021 </td>
			<td> 0 </td>
			<td> - </td>
			<td> 4500 </td>
			<td> 3 дня ремонт </td>
			<td> - </td>
			<td> 600 </td>
			<td> 2000 </td>
			<td> - </td>
			<td> - </td>
			<td> 0 </td>
			<td> - </td>
			<td> 47400 </td>
			<td> 68000 </td>
			<td> 47400 </td>
		</tr>
</table>

</main>

</body>
</html>
