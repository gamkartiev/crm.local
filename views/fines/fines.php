<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Штрафы водителей </title>
  <link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>

<body>
<header>
  <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/fines/add"> Добавить новый штраф </a> <br /> <br />

<table width="95%" border="1">

		<tr>
      <td> <b> ФИО </b> </td>
			<td> <b> Постановление </b> </td>
			<td> <b> Дата нарушения </b> </td>
			<td> <b> Время нарушения </b> </td>
			<td> <b> ТС </b> </td>
			<td> <b> Месяц, год удержания </b> </td>
			<td> <b> Удержано с экспедитора </b> </td>
			<td> <b> К оплате </b> </td>
			<td> <b> Срок оплаты </b> </td>
			<td> <b> К оплате по истечению срока </b> </td>
			<td> <b> Дата формирования заявки </b> </td>
      <td> <b> Примечание </b> </td>
      <td> <b> Статус оплаты </b> </td>
		</tr>
		<?php foreach($allFines as $a): ?>
		<tr>
			<td> <?=$a['driver']?> </td>
			<td> <?=$a['decree']?> </td>
			<td> <?=$a['date_of_violation']?> </td>
			<td> <?=$a['time_of_violation']?> </td>
			<td> <?=$a['car']?> </td>
			<td> <?=$a['hold_date']?> </td>
			<td> <?=$a['withheld']?> </td>
			<td> <?=$a['to_pay']?> </td>
			<td> <?=$a['due_date']?> </td>
			<td> <?=$a['after_the_due_date']?> </td>
			<td> <?=$a['date_of_application']?> </td>
      <td> <?=$a['note']?> </td>
			<td> <?=$a['status']?> </td>
      <td> <a href="/fines/edit/<?=$a['id']?>"> редактировать </a></td>
      <td> <a href="/fines/delete/<?=$a['id']?>"> удалить </a></td>
		</tr>
    <?php endforeach; ?>
</table>
</main>

</body>
</html>
