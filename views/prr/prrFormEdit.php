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

<form action="/prr/add" method="post">
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
	</tr>
	<?php }	?>

</table>
<button type="submit" name="button"> Добавить </button>
</form>

</main>

</body>
</html>
