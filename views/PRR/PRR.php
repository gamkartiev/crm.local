<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Водители </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
	<link rel="stylesheet" type="text/css" href="/views/css/prr.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>


<!-- <table class="tablePrr">
	<tr>
		<td> <b> Водитель </b> </td>
		<?php
		  // for ($i=0; $i < 32; $i++) {
			//   echo "<td class='dayPrr'>".$i."</td>";
		  //}
		?>
	</tr>
	<tr>
		<td> Иванов </td>
		<?php
		  // for ($i=0; $i < 32; $i++) {
			//   echo "<td> <input type='checkbox' class='dayPrr' name='$i' value='$i'> </td>";
		  // }
		?>
	</tr>
</table> <br /><br /> <br /><br /> <br /><br /> -->

<table class="tablePrr">
	<tr>
		<td> <b> Водитель </b> </td>
		<td> <b> Событие </b> </td>
		<td> <b> Дата начала </b> </td>
		<td> <b> Дата оканчания </b> </td>
	</tr>
	<?php foreach($allEvents as $a): ?>
	<tr>
		<td> <?= $a['driver'] ?>  </td>
		<td> <?= $a['event'] ?>  </td>
		<td> <?= $a['start'] ?>  </td>
		<td> <?= $a['the_end'] ?> </td>
		<td> <a href="/prr/delete/<?= $a['id'] ?>"> Удалить </a> </td>
	</tr>
<?php endforeach; ?>
</table>


<section class="to_list">
	Год:
	<?php foreach($allPrrMonth as $a): ?>
		<!-- $a[0] - передается числовое значение месяца из многомер массива -->
		<!-- $a[1] - выводится строкое значение месяца из многомер массива -->
		 <a href="/prr/view/<?=$a[0]?>"> <?php echo $a[1] ?> </a>
	<?php endforeach ?>
</section>


<form class="right_panel" action="/prr/add" method="post">
	<p> Добавление выходных/рабочих дней водителю: </p>

	<label> Водитель:
	 <select name="id_drivers" required>
	    <option disabled>Выберите водителя:</option>
	    <option>    </option>
	    <?php foreach($drivers as $a): ?>
	    <option value="<?=$a['id']?>"> <?=$a['driver']?></option>
	    <<?php endforeach; ?>
	 </select>
 </label> <br /><br />

	<label> Событие:
		<select name="event">
			<option> Выходной </option>
			<option> Рабочий день </option>
			<option> Ремонты </option>
		</select>
	</label>

	<p> Дата начала события: <input type="date" name="start" value="<?= date("Y-m-d") ?>"> </p>
	<p> Дата окончания события (включительно): <input type="date" name="the_end" value="<?= date("Y-m-d") ?>"> </p>

	<button type="submit" name="button"> Добавить </button>
</form>


</main>

</body>
</html>
