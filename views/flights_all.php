<!DOCTYPE html>
<html>
<head>
	<title> Все рейсы </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>


<header> <!-- Сделать отдельной страничкой -->
 <?php include ("header.php"); ?>
</header>

<main>

<a href="index.php?action=addNewFlight"> Добавить новую статью </a>

<table>
	<tr class="firstRow">
		<th> Дата загрузки </th>
		<th> Дата выгрузки </th>
		<th> Откуда</th>
		<th> Куда</th>

		<th> Заказчик</th>
		<!-- <th> Логист </th> -->

		<th> Груз</th>
		<th> Объем </th>
		<th> Вес</th>
		<th> Цена </th>
		<th> Форма оплаты <th>

		<th> Водитель</th>
		<th> Машина </th>
		<th> Полуприцеп </th>

		<th> Доверенность </th>
		<th> Заявка </th>
		<th> Примечание</th>
	</tr>
	<?php

	foreach($allFlights as $a): ?>
	<tr class="row">
		<td> <?=$a['date_1']?> </td>
		<td> <?=$a['date_2']?> </td>
		<td> <?=$a['place_1']?> </td>
		<td> <?=$a['place_2']?> </td>

		<td> <?=$a['short_name']?> </td>

		<td> <?=$a['freight']?> </td>
		<td> <?=$a['volume']?> </td>
		<td> <?=$a['weight']?> </td>
		<td> <?=$a['cost']?> </td>
		<td> <?=$a['form_of_payment']?> </td>

		<td> <?=$a['surname']?> </td>
		<td> <?=$a['model_cars']?> </td>
		<td> <?=$a['attached_trailer']?> </td>

		<td> <?=$a['proxy']?> </td>
		<td> <?=$a['request']?> </td>
		<td> <?=$a['note']?> </td>
	</tr>
<?php endforeach; ?>
</table>

</main>
<script src="/views/js.js"></script>


<!-- <footer></footer> -->
<script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->

</body>
</html>
