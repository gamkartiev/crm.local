<!DOCTYPE html>
<html>
<head>
	<title> Все рейсы </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>


<header> <!-- Сделать отдельной страничкой -->
 <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/flights/add"> Добавить новую статью </a>

<table border='1'>
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
		<th> Форма оплаты </th>

		<!-- <th> Водитель</th> -->
		<th> Машина </th>
		<!-- <th> Полуприцеп </th> -->

		<th> Доверенность </th>
		<th> Заявка </th>
		<th> Примечание</th>
	</tr>

		<tr class="row">
			<td> <?=$oneFlights['date_1']?> </td>
			<td> <?=$oneFlights['date_2']?> </td>
			<td> <?=$oneFlights['place_1']?> </td>
			<td> <?=$oneFlights['place_2']?> </td>

			<td> <?=$oneFlights['customers']?> </td>

			<td> <?=$oneFlights['freight']?> </td>
			<td> <?=$oneFlights['volume']?> </td>
			<td> <?=$oneFlights['weight']?> </td>
			<td> <?=$oneFlights['cost']?> </td>
			<td> <?=$oneFlights['form_of_payment']?> </td>

			<td> <?=$oneFlights['state_sign_cars']?> </td>

			<td> <?=$oneFlights['proxy']?> </td>
			<td> <?=$oneFlights['request']?> </td>
			<td> <?=$oneFlights['note']?> </td>
		</tr>
	</a>

</table>

</main>
<!-- <script src="/views/js.js"></script>


<footer></footer>
<script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->

</body>
</html>
