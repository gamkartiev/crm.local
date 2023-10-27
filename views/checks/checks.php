<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Чеки </title>
  <link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>

<body>
<header>
  <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/checks/add"> Добавить новый чек </a> <br /> <br />

<table width="95%" border="1">

		<tr>
      <td> <b> ФИО </b> </td>
			<td> <b> Сумма чека к оплате, руб </b> </td>
			<td> <b> Дата чека </b> </td>
			<td> <b> Пояснение </b> </td>
			<td> <b> Статус чека (оплачено до ЗП или нет) </b> </td>
			<td> <b> Наличие чека </b> </td>
		</tr>
		<?php foreach($allChecks as $a): ?>
		<tr>
			<td> <?=$a['driver']?> </td>
			<td> <?=$a['sum']?> </td>
			<td> <?=$a['date']?> </td>
			<td> <?=$a['note']?> </td>
			<td> <?=$a['status']?> </td>
			<td> <?=$a['availability_of_a_check']?> </td>
      <td> <a href="/checks/edit/<?=$a['id']?>"> редактировать </a></td>
      <td> <a href="/checks/delete/<?=$a['id']?>"> удалить </a></td>
		</tr>
    <?php endforeach; ?>
</table>
</main>

</body>
</html>
