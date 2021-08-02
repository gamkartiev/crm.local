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
<p class="table_salary" >
	<p class="firstRow tr">
		<p class="th drivers"> Водители </p>
		<p class="th payment"> Расчет оплаты за рейс </p>
		<p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
    <p class="th PRR"> ПРР </p>
	</p>
	<p class="row tr">
		<p class="td col_1">  <?=date("j.m.Y",strtotime($a['date_1']))?></p>
		<p class="td col_2"> <?=date("j.m.Y",strtotime($a['date_2']))?> </p>
		<p class="td col_3"> <?=$a['place_1']?> </p>
		<p class="td col_4"> <?=$a['place_2']?> </p>
	</p>
</p>



</main>

</body>
</html>
