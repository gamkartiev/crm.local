<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Редактировать суточные водителей </title>
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

<form class="prrFormEdit" action="/prr/edit/<?=$id?>" method="post">
<table>

<tr>
	<th> Водители </th>
	<!-- рассчитать количество дней в месяце: -->
	<?php	for ($k=1; $k <= $numberOfDaysInMonth; $k++) { ?>
	<td>
		<?php echo $k;
		} ?>
	</td>
</tr>

<?php for ($j=0; $j < count($getLastMonthPrr); $j++) { ?>
<tr>
	<th> <? echo $getLastMonthPrr[$j]['drivers']; ?> </th> <!-- список водителей -->
	<?php for ($i=1; $i <= $numberOfDaysInMonth; $i++) {	?>
		<td> <input type="text" name="<?=$getLastMonthPrr[$j]['id']."_".$i ?>" value="<?=$getLastMonthPrr[$j][$i] ?>">	</td>
	<?php } ?>
</tr>
<?php } ?>

</table><br />
<button type="submit" name="button"> Добавить </button>
</form>

</main>

</body>
</html>
