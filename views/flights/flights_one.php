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
		<b>
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
		<p class="th col_14"> Примечание</p></b>

		<p class="th col_15"> Оплата водителю </p>
	</p>
	<p class="row tr">
		<p class="td col_1">  <?=date("j.m.Y",strtotime($oneFlights['0']['date_1']))?></p>
		<p class="td col_2"> <?=date("j.m.Y",strtotime($oneFlights['0']['date_2']))?> </p>
		<p class="td col_3"> <?=$oneFlights['0']['place_1']?> </p>
		<p class="td col_4"> <?=$oneFlights['0']['place_2']?> </p>

		<p class="td col_5"> <?=$oneFlights['0']['customers']?> </p>

		<p class="td col_6"> <?=$oneFlights['0']['freight']?> </p>
		<p class="td col_7"> <?=$oneFlights['0']['volume']?> </p>
		<p class="td col_8"> <?=$oneFlights['0']['weight']?> </p>
		<p class="td col_9"> <?=$oneFlights['0']['cost']?> </p>
		<p class="td col_10"> <?=$oneFlights['0']['form_of_payment']?> </p>

		<p class="td col_11"> <?=$oneFlights['0']['car']?> </p>

		<p class="td col_12"> <?=$oneFlights['0']['proxy']?> </p>
		<p class="td col_13"> <?=$oneFlights['0']['request']?> </p>
		<p class="td col_14"> <?=$oneFlights['0']['note']?> </p>

		<p class="td col_15"> <?=$oneFlights['0']['drivers_payment']?> </p>

		<p class="td col_16"> <a href="/flights/edit/<?=$id?>" class="bottom-edit"> Редактировать рейс </a> </p>
		<p class="td col_17"> <a href="/flights/delete/<?=$id?>" class="bottom-edit"> Удалить рейс </a> </p>
	</p>
</p>


</main>
</body>


</html>
