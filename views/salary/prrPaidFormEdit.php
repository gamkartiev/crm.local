<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Водители </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
	<link rel="stylesheet" type="text/css" href="/views/css/prr.css">
	<style type="text/css">
   TABLE td, th{
    border: 1px solid black; /* Рамка вокруг таблицы */
   }
	 </style>
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

<form class="prrFormEdit" action="/salary/add_paid_prr/<?=$id?>" method="post">
	<table>

	<tr>
		<td colspan="4"> <?php $prr_paid['0']['month_and_years'] ?> </td>
	</tr>
	<tr>
		<th> Водители </th>
		<th> ПРР, выплаченные </th>
		<th> Дата выплат ПРР </th>
	</tr>
	<?php for ($i=0; $i<count($oneMonth) ; $i++) { ?>
	<tr>

		<input type="hidden" name="id_prr_paid_<?=$i?>" value="<?=$oneMonth[$i]['id_prr_paid']?>">
		<!-- <input type="hidden" name="numberOfDrivers" value="<?= ++$j ?>">  количество водителей -->
		<td> <?php echo $oneMonth[$i]['driver'] ?> </td> <!-- ПРР, выплаченные -->
		<td> <input type="text" class="inputPaidPrr" name="sum_prr_paid_<?=$i?>" value="<?=$oneMonth[$i]['sum_prr_paid']?>"> </td> <!-- ПРР, выплаченные -->
		<td> <input type="text" class="inputPaidPrr" name="date_prr_paid_<?=$i?>" value="<?=$oneMonth[$i]['date_prr_paid']?>"> </td> <!-- Дата выплат ПРР -->
	</tr>
<?php } ?>
	</table><br />

	<button type="submit" name="button"> Изменить </button>
</form>

</main>

</body>
</html>
