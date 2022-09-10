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

<a href="/prr/add"> Добавить новый месяц </a> <br /> <br />
<select class="" name="">
	<option disabled> Выберите месяц </option>
	<a href="/prr/add/01"><option> Январь 	</option></a>
	<option><a href="/prr/add/02"> Февраль 	</a></option>
	<option><a href="/prr/add/03"> Март 		</a></option>
	<option><a href="/prr/add/04"> Апрель 	</a></option>
	<option><a href="/prr/add/05"> Май 			</a></option>
	<option><a href="/prr/add/06"> Июнь 		</a></option>
	<option><a href="/prr/add/07"> Июль 		</a></option>
	<option><a href="/prr/add/08"> Август 	</a></option>
	<option><a href="/prr/add/09"> Сентябрь </a></option>
	<option><a href="/prr/add/10"> Октябрь 	</a></option>
	<option><a href="/prr/add/11"> Ноябрь 	</a></option>
	<option><a href="/prr/add/12"> Декабрь 	</a></option>
</select>

</form>
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

	<?php for ($i=0; $i < count($driversTest); $i++) { ?>
	<tr>
		<th> <?php echo $driversTest[$i] ?> </th>

		<input type="hidden" name="array[<?=$i?>][<?=0?>]" value="<?= $driversTest[$i] ?>">
		<?php	for ($j=1; $j <= $numberOfDaysInMonth; $j++) {	?>
			<td> <input type="text" size="1" name="array[<?=$i?>][<?=$j?>]" value="0"> </td>
		<?php }	?>
	</tr>
	<?php }	?>

</table>
<button type="submit" name="button"> Добавить </button>
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
