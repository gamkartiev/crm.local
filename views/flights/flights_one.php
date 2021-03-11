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

<a href="/flights/add"> Добавить новый рейс </a>

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
			<td> <?=$oneFlights['0']['date_1']?> </td>
			<td> <?=$oneFlights['0']['date_2']?> </td>
			<td> <?=$oneFlights['0']['place_1']?> </td>
			<td> <?=$oneFlights['0']['place_2']?> </td>

			<td> <?=$oneFlights['0']['customers']?> </td>

			<td> <?=$oneFlights['0']['freight']?> </td>
			<td> <?=$oneFlights['0']['volume']?> </td>
			<td> <?=$oneFlights['0']['weight']?> </td>
			<td> <?=$oneFlights['0']['cost']?> </td>
			<td> <?=$oneFlights['0']['form_of_payment']?> </td>

			<td> <?=$oneFlights['0']['car']?> </td>

			<td> <?=$oneFlights['0']['proxy']?> </td>
			<td> <?=$oneFlights['0']['request']?> </td>
			<td> <?=$oneFlights['0']['note']?> </td>
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
