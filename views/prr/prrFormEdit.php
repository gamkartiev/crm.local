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

<form class="prrFormEdit" action="/prr/add" method="post">
<?php
	$massive = array(array ("drivers" => "Вершинников Алексей", "month_and_years"=>"2022-02-01", "1"=>"700", "2"=>"0", "3"=>"700"),
									 array ("drivers" => "Иванов", "month_and_years"=>"2022-02-01", "1"=>"700", "2"=>"700", "3"=>"700"),
									 array ("drivers" => "Акушеров", "month_and_years"=>"2022-02-01", "1"=>"0", "2"=>"0", "3"=>"700"));


	for ($k=1; $k <= 4; $k++) {
		echo "<td> $k </td>";
	}
	for ($j=0; $j < count($massive); $j++) { ?>


		<div class="input">
			<div class="driversPrrFormEdit">
				<? echo $massive[$j]['drivers']; ?>
			</div>
		<?php for ($i=1; $i < 4; $i++) {	?>
			<input type="text" name="<?=$massive[$j]['drivers']."_".$i ?>" value="<?=$massive[$j][$i] ?>"> <br />
		<?php	} ?>
		</div>
<?php	}	?>

<button type="submit" name="button"> Добавить </button>

</form>



<!-- <table>
	<tr>
		<th> Водители </th>
<td> - столбцы с датами месяца -->
		<!-- <php
		for ($i=1; $i <= $numberOfDaysInMonth; $i++) {
		echo "<td> $i </td>";
		}>
</td> -->
	<!-- </tr>

	<php for ($i=0; $i < count($oneMonthPrr); $i++) { ?>
	<tr>
		<th> <php echo $oneMonthPrr[$i] ?> </th>

		<input type="hidden" name="array[<=$i?>][<=0?>]" value="<= $oneMonthPrr[$i] ?>">
		<php	for ($j=1; $j <= $numberOfDaysInMonth; $j++) {	?>
			<td> <input type="text" size="1" name="array[<=$i?>][<=$j?>]" value="0"> </td>
		<php }	?>
	</tr>
	<php }	?>

</table> -->

</main>

</body>
</html>
