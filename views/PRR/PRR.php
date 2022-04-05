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


<table class="tablePrr">
	<tr>
		<td> <b> Водитель </b> </td>
		<?php
		  for ($i=0; $i < 32; $i++) {
			  echo "<td class='dayPrr'>".$i."</td>";
		  }
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
</table>



<form class="right_panel" action="/prr/add" method="post">
	<p> Добавление выходных водителю </p>
	<label> Водитель:
	 <select name="id_drivers" required>
	    <option disabled>Выберите водителя:</option>
	    <option>    </option>
	    <?php foreach($drivers as $a): ?>
	    <option value="<?=$a['id']?>"> <?=$a['driver']?></option>
	    <<?php endforeach; ?>
	 </select>
	 </label>
	<p> Событие: <input type="text" name="event"> </p>
	<p> Дата начала: <input type="date" name="start" value="<?= date("Y-m-d") ?>"> </p>
	<p> Дата окончания: <input type="date" name="the_end" value="<?= date("Y-m-d") ?>"> </p>

	<button type="submit" name="button"> Добавить </button>
</form>


</main>

</body>
</html>
