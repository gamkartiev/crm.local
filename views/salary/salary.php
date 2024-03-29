<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Зарплата </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
  <link rel="stylesheet" type="text/css" href="/views/css/salary.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

	<section class="to_list">
		Год:
		<?php foreach($allSalaryMonth as $a): ?>
			 <a href="/salary/view/<?=$a[0]?>"> <?php echo $a[1] ?> </a>
		<?php endforeach ?>
	</section>

<!-- <a href="/salary/edit_paid_prr/<?=$id?>"> Изменить "Выплаченные ПРР" </a> <br /> <br /> -->
<a href="/driversOtherWorks/view/<?= $id?>"> Изменить Прочие работы </a> <br /> <br />
<!-- <a href="/salary/edit_other_works/<?=$id?>"> Изменить Прочие работы </a> <br /> <br /> -->

<table width="95%" border="1">
		<tr>
			<td colspan="21"> <?php echo $id ?> </td>
		</tr>
		<tr>
			<td rowspan="2"> <b> Водители </b> </td>
			<td colspan="3"> <b> Расчет оплаты за рейс </b> </td>
			<td colspan="4"> <b> ПРР </b> </td>
			<td colspan="4"> <b> Прочие работы </b> </td>
			<td rowspan="2"> <b> Моб. связь </b> </td>
			<td colspan="3"> <b> Штрафы </b> </td>
			<td colspan="2"> <b> Чеки </b> </td>
			<td rowspan="2"> <b> ИТОГО к доплате (чеки не учитываются) </b> </td>
			<td rowspan="2"> <b> Итоговый доход (чеки не учит-ся и не учит-ся выплач-е ПРР) </b> </td>
			<td rowspan="2"> <b> ИТОГО к доплате (чеки учит-ся) </b> </td>
		</tr>
		<tr>
			<td> <b> Зар. плата </b> </td>
			<td> <b> Премия </b> </td>
			<td> <b> Премия + ЗП </b> </td>
			<td> <b> ПРР </b> </td>
			<td> <b> Выплачено ПРР </b> </td>
			<td> <b> Даты выплат ПРР </b> </td>
			<td> <b> Расчет доплаты/ вычета ПРР </b> </td>
			<td> <b> Прочие работы </b> </td>
			<td> <b> Выплаченно за Прочие работы </b> </td>
			<td> <b> Расчет доплаты за проч. работы </b> </td>
			<td> <b> Прим-е </b> </td>
			<td> <b> Штрафы ГИБДД </b> </td>
			<td> <b> Проч. штрафы </b> </td>
			<td> <b> Прим-е </b> </td>
			<td> <b> Комп. чеков </b> </td>
			<td> <b> Прим-е </b> </td>
		</tr>

		<?php foreach ($oneMonth as $a): ?>
		<tr>
			<td><b> <?= $a['driver'] ?> </b></td>
			<td><b> <?= $a['cost'] ?> </b></td>
			<td> <?= $a['percent'] ?> % </td>
			<td> <?= $a['cost_and_percent'] ?> </td>
			<td> <?= $a['prr'] ?> </td>
			<td> <a href="/salary/edit_paid_prr/<?=$id?>"> <?=$a['sum_prr_paid'] ?>  </a> </td>
			<td> <a href="/salary/edit_paid_prr/<?=$id?>"> <?=$a['date_prr_paid'] ?> </a> </td>
			<td> <?= $a['autoCalcPrr'] ?> </td>
			<td> <?= $a['sum_not_paid_driversOtherWorks'] ?></td>
			<td> <?= $a['sum_paid_driversOtherWorks'] ?> </td>
			<td> <?= $a['autoCalcSumNotPaid'] ?> </td>
			<td> <?= $a['note_driversOtherWorks'] ?> </td>
			<td> <?= $a['mobile'] ?> </td>
			<td> <?= $a['fines'] ?>  </td>
			<td> <a href="/salary/edit_other_fines/<?=$a['id_otherFines']?>"> <?= $a['otherFines'] ?></td>
			<td> <a href="/salary/edit_other_fines/<?=$a['id_otherFines']?>"> <?= $a['note_otherFines'] ?></td>
			<td> <?= $a['checks'] ?> </td>
			<td>  </td>
			<td>  </td>
			<td>  </td>
			<td>  </td>
		</tr>
		<?php endforeach; ?>

</table>

</main>

</body>
</html>
