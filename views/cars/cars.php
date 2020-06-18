<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Машины </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>
<section class="to_list">
	<?php
	foreach($allCarsName as $a): ?>
		  <a href="index.php?selectedPage=cars&id=<?=$a['id']?>"> <?php echo $a['state_sign_cars']; ?> </a>
	<?php endforeach ?>

</section>

<?php foreach($oneCarsName as $b) : ?>
<section class="left_panel">
	<div class="car_car_model"> <span class="bold">Тягач(модель):</span> <?= $b['model_cars']?> <br /></div>
	<div class="car_car_state_sign"> <span class="bold">Тягач(гос.знак):</span> <?= $b['state_sign_cars']?> <br /></div>
	<div class="car_car_PTS"> <span class="bold">ПТС:</span> <?= $b['PTS_cars']?> <br /></div>
	<div class="car_car_STS"> <span class="bold">СТС:</span> <?= $b['STS_cars']?>  <br /></div>
	<div class="car_car_VIN"> <span class="bold">VIN:</span> <?= $b['VIN_cars']?> <br /></div>
	<div class="car_car_year"> <span class="bold">Год:</span> <?= $b['year_cars']?> <br /><br /></div>

	<div class="car_trailer_model"> <span class="bold">Полуприцеп(модель):</span> ТОНАР-9989<br /></div>
	<div class="car_trailer_state_sign"> <span class="bold">Полуприцеп(гос.знак):</span> <?= $b['attached_trailer']?> <br /></div>
	<div class="car_trailer_PTS"> <span class="bold">ПТС:</span> 44 88 994455 <br /></div>
	<div class="car_trailer_STS"> <span class="bold">СТС:</span> 55 ВА 882266 <br /></div>
	<div class="car_trailer_VIN"> <span class="bold">VIN:</span> 44455887711445566 <br /></div>
	<div class="car_trailer_year"> <span class="bold">Год:</span> 2018 <br /></div>
</section>
<?php endforeach ?>
</main>

	<script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
</body>
</html>
