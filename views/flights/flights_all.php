<!DOCTYPE html>
<html>
<head>
	<title> Все рейсы </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>


<header>
 <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/flights/add"> Добавить новый рейс </a>

<p class="table" >
	<p class="firstRow tr">
		<p class="th col_1"> Дата загрузки </p>
		<p class="th col_2"> Дата выгрузки </p>
		<p class="th col_3"> Откуда</p>
		<p class="th col_4"> Куда</p>

		<p class="th col_5"> Заказчик</p>

		<p class="th col_6"> Груз</p>
		<p class="th col_7"> Объем </p>
		<p class="th col_8"> Вес</p>
		<p class="th col_9"> Цена </p>
		<p class="th col_10"> Форма оплаты </p>

		<p class="th col_11"> Машина </p>

		<p class="th col_12"> Доверенность </p>
		<p class="th col_13"> Заявка </p>
		<p class="th col_14"> Примечание</p>

		<p class="th col_15"> Оплата водителю </p>
	</p>
	<?php
	foreach($allFlights as $a): ?>
		<a href="/flights/view/<?=$a['id']?>">
		<p class="row tr">
			<p class="td col_1">  <?=date("j.m.Y",strtotime($a['date_1']))?></p>
			<p class="td col_2"> <?=date("j.m.Y",strtotime($a['date_2']))?> </p>
			<p class="td col_3"> <?=$a['place_1']?> </p>
			<p class="td col_4"> <?=$a['place_2']?> </p>

			<p class="td col_5"> <?=$a['customers']?> </p>

			<p class="td col_6"> <?=$a['freight']?> </p>
			<p class="td col_7"> <?=$a['volume']?> </p>
			<p class="td col_8"> <?=$a['weight']?> </p>
			<p class="td col_9"> <?=$a['cost']?> </p>
			<p class="td col_10"> <?=$a['form_of_payment']?> </p>

			<p class="td col_11"> <?=$a['car']?> </p>

			<p class="td col_12"> <?=$a['proxy']?> </p>
			<p class="td col_13"> <?=$a['request']?> </p>
			<p class="td col_14"> <?=$a['note']?> </p>

			<p class="td col_15"> <?=$a['drivers_payment']?> </p>
		</p>
		</a>

<?php endforeach; ?>
</p>

</main>

</body>
</html>
