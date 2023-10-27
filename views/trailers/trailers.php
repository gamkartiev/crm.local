<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Прицепы </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/trailers/add"> Добавить новый прицеп </a> <br /> <br />

<section class="to_list">

	Прицепы:
	<?php	foreach($allTrailersName as $a	): ?>
			<a href="/trailers/view/<?=$a['id']?>"> <?php echo ($a['brand']." ".$a['state_sign_trailer']); ?> </a>
	<?php endforeach ?>

</section>

<?php foreach($oneTrailerName as $b) : ?>
<section class="left_panel">
	<a href="/trailers/edit/<?=$b['id']?>" class="bottom-edit"> Редактировать данные прицепа </a> <br />

<!-- Изменить car_car_model на что-то типа trailer_trailer_model -->
	<div class="car_car_model"> <span class="bold">Тягач(модель):</span> <?= $b['brand']?> <br /></div>	<br />
	<div class="car_car_state_sign"> <span class="bold">Тягач(гос.знак):</span> <?= $b['state_sign_trailer']?> <br /></div> <br />
	<div class="car_car_PTS"> <span class="bold">ПТС:</span> <?= $b['PTS_trailer']?> <br /></div>
	<div class="car_car_STS"> <span class="bold">СТС:</span> <?= $b['STS_trailer']?>  <br /></div>
	<div class="car_car_VIN"> <span class="bold">VIN:</span> <?= $b['VIN_trailer']?> <br /></div>

	<br /> <br />
	<a href="/trailers/delete/<?=$b['id']?>" class="bottom-delete">Удалить прицеп</a>
</section>
<?php endforeach ?>


</main>

</body>
</html>
