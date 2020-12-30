<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Машины </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>

<header>
	<?php include ("views/header.php"); ?>
</header>

<main>



<section class="to_list">
	Список ТС:
	<?php	foreach($allCarsName as $a): ?>
		<a href="/cars/view/<?=$a['id']?>"> <?php echo ($a['id_tractor']." / ".$a['id_trailer']); ?> </a>
	<?php endforeach ?>  <br />
</section>

<?php foreach($oneCarName as $b) : ?>
	<section class="left_panel_car">

		<div class="car_car_model"> <span class="bold">Модель:</span> <?= $b['id_tractor']?> <br /></div>	<br />
		<div class="car_car_state_sign"> <span class="bold">Гос.знак:</span> <?= $b['id_driver']?> <br /></div> <br />
		<div class="car_car_PTS"> <span class="bold">ПТС:</span> <?= $b['id_trailer']?> <br /></div>
		<div class="car_car_STS"> <span class="bold">СТС:</span> <?= $b['created_add']?>  <br /></div>
		<div class="car_car_VIN"> <span class="bold">VIN:</span> <?= $b['updated_add']?> <br /></div>

	</section>
<?php endforeach ?>

<?php foreach($oneTrailerName as $b) : ?>
	<section class="left_panel_tractor">
	</section>
<?php endforeach ?>

<?php foreach($oneDriverName as $b) : ?>
	<section class="left_panel_trailer">
	</section>
<?php endforeach ?>



</main>

</body>
</html>
