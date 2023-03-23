<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Водители </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
	<link rel="stylesheet" type="text/css" href="/views/css/prr.css">
	<style type="text/css">
   TABLE td, th{
    border: 1px solid black; /* Рамка вокруг таблицы */
   }
	 </style>
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/prr/edit/<?= $id ?>"> Изменить данные </a><br /><br />

<!-- <a href="/prr/update/< $id ?>"> Обновить данные </a><br /> -->

<form action="/prr/view" method="post">
<table>
	<tr>
		<th> Водители	 </th>
		<!-- <td> - столбцы с датами месяца -->
		<?php
		for ($i=1; $i <= $numberOfDaysInMonth; $i++) {
		echo "<td> $i </td>";
		}?>
		<!-- </td> -->
	</tr>

	<?php for ($i=0; $i < count($getLastMonthPrr); $i++) { ?>
	<tr>
		<th> <?php echo $getLastMonthPrr[$i]['drivers']; ?> </th>
		<?php	for ($j=1; $j <= $numberOfDaysInMonth; $j++){	?>
			<td> <?php echo $getLastMonthPrr[$i][$j]; ?></td>
		<?php }	?>
	</tr>
	<?php }	?>

</table>
</form>



<!-- правая боковая панель -->
<section class="to_list">
	Год:
	<?php foreach($allPrrMonth as $a): ?>
		<!-- $a[0] - передается числовое значение месяца из многомер массива -->
		<!-- $a[1] - выводится строкое значение месяца из многомер массива -->
		 <a href="/prr/view/<?=$a[0]?>"> <?php echo $a[1] ?> </a>
	<?php endforeach ?>
</section>





</main>

</body>
</html>
