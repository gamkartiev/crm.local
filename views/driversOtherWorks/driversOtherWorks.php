<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Другие работы водителей </title>
  <link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>

<body>
<header>
  <?php include ("views/header.php"); ?>
</header>

<main>
<div class="">
  Работы выполненные водителями в своей деятельности и, которые, нужно учитывать
  в зарплатную ведомость.
</div>
<a href="/driversOtherWorks/add"> Добавить новые работы </a> <br /> <br />

<table width="95%" border="1">

		<tr>
      <td> <b> ФИО </b> </td>
			<td> <b> Сумма за прочие работы </b> </td>
			<td> <b> Дата прочих работ </b> </td>
			<td> <b> Статус оплаты </b> </td>
			<td> <b> Примечание </b> </td>

		</tr>
		<?php foreach($allDriversOtherWorks as $a): ?>
		<tr>
			<td> <?=$a['driver']?> </td>
			<td> <?=$a['Sum']?> </td>
			<td> <?=$a['date_of_work']?> </td>
			<td> <?=$a['status']?> </td>
      <td> <?=$a['note']?> </td>

      <td> <a href="/driversOtherWorks/edit/<?=$a['id']?>"> редактировать </a></td>
      <td> <a href="/driversOtherWorks/delete/<?=$a['id']?>"> удалить </a></td>
		</tr>
    <?php endforeach; ?>
</table>
</main>

</body>
</html>
