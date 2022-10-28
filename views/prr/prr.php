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

<a href="prr/update/"> Обновить данные </a><br />

<form action="/prr/view" method="post">
<table>
	<tr>
		<th> Водители </th>
		<!-- <td> - столбцы с датами месяца -->
		<?php
		for ($i=1; $i <= $numberOfDaysInMonth; $i++) {
		echo "<td> $i </td>";
		}?>
		<!-- </td> -->
	</tr>

	<?php for ($i=0; $i < count($oneMonthPrr); $i++) { ?>
	<tr>
		<th> <?php echo $oneMonthPrr[$i] ?> </th>

		<input type="hidden" name="array[<?=$i?>][<?=0?>]" value="<?= $oneMonthPrr[$i] ?>">
		<?php	for ($j=1; $j <= $numberOfDaysInMonth; $j++) {	?>
			<td> <input type="text" size="1" name="array[<?=$i?>][<?=$j?>]" value="0"> </td>
		<?php }	?>
	</tr>s
	<?php }	?>

</table>
<button type="submit" name="button"> Отправить </button>
</form>





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
