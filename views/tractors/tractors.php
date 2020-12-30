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

<a href="/tractors/add"> Добавить новый тягач </a> <br /> <br />

<section class="to_list">

	Тягачи:
	<?php	foreach($allTractorsName as $a): ?>
			<a href="/tractors/view/<?=$a['id']?>"> <?php echo ($a['brand']." ".$a['state_sign_tractor']); ?> </a>
	<?php endforeach ?>
	<br />

</section>

<?php foreach($oneTractorName as $b) : ?>
<section class="left_panel">
	<a href="/tractors/edit/<?=$b['id']?>" class="bottom-edit"> Редактировать данные тягача </a> <br />

<!-- Поменять название класса car_car_model на какой-нибудь tractor_tractor_model -->
	<div class="car_car_model"> <span class="bold">Модель:</span> <?= $b['brand']?> <br /></div>	<br />
	<div class="car_car_state_sign"> <span class="bold">Гос.знак:</span> <?= $b['state_sign_tractor']?> <br /></div> <br />
	<div class="car_car_PTS"> <span class="bold">ПТС:</span> <?= $b['PTS_tractor']?> <br /></div>
	<div class="car_car_STS"> <span class="bold">СТС:</span> <?= $b['STS_tractor']?>  <br /></div>
	<div class="car_car_VIN"> <span class="bold">VIN:</span> <?= $b['VIN_tractor']?> <br /></div>

	<br /> <br />
	<a href="/tractors/delete/<?=$b['id']?>" class="bottom-delete">Удалить тягач</a>
</section>
<?php endforeach ?>

</main>

</body>
</html>
