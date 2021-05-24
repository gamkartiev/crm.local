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
<a href="/cars/add"> Добавить новую машину </a> <br /> <br />


<section class="to_list">
	Список ТС:
	<?php	foreach($allCarsName as $a): ?>
		<a href="/cars/view/<?=$a['id']?>"> <?php echo ($a['brand']." ".$a['state_sign_cars']);?> </a>
	<?php endforeach ?>  <br />
</section>


<?php foreach($oneCarName as $b) : ?>
	<section class="left_panel">
		<a href="/cars/edit/<?=$b['id']?>" class="bottom-edit"> Редактировать данные машины </a> <br />

		<div class="car_car_model"> <span class="bold">Модель:</span> <?= $b['brand']?> <br /></div>	<br />
		<div class="car_car_state_sign"> <span class="bold">Гос.знак:</span> <?= $b['state_sign_cars']?> <br /></div> <br />
		<div class="car_car_PTS"> <span class="bold">ПТС:</span> <?= $b['PTS_cars']?> <br /></div>
		<div class="car_car_STS"> <span class="bold">СТС:</span> <?= $b['STS_cars']?>  <br /></div>
		<div class="car_car_VIN"> <span class="bold">VIN:</span> <?= $b['VIN_cars']?> <br /></div>

		<br /> <br />
		<a href="/cars/delete/<?=$b['id']?>" class="bottom-delete">Удалить машину</a>
	</section>
<?php endforeach ?>



</main>

</body>
</html>
