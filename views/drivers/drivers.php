<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Водители </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>


<section class="to_list">
	 <?php foreach($allDriversName as $a): ?>
	   	 <a href="index.php?selectedPage=drivers&id=<?=$a['id']?>"> <?php echo $a['surname'].' '.$a['first_name'].' '.$a['patronymic']; ?> </a>
	 <?php endforeach ?>
</section>

<?php foreach($oneDriversName as $b):?>
<section class="left_panel">
	<div class="surName"> <span class="bold"> Фамилия:</span> <?=$b['surname']?> <br /></div>
	<div class="firstName"> <span class="bold"> Имя:</span> <?=$b['first_name']?> <br /></div>
	<div class="middleName"> <span class="bold"> Отчество:</span> <?=$b['patronymic']?> <br /><br /></div>

	<div class="driver_car_model"> <span class="bold"> Машина(Марка): </span> <?=$b['']?> <br /></div>
	<div class="driver_car_state_sign"> <span class="bold"> Машина(гос.знак): </span> <?=$b['']?><br /></div>
	<div class="driver_trailer_state_sign"> <span class="bold"> Полуприцеп(Марка): </span> <?=$b['']?><br /></div>
	<div class="driver_trailer_state_sign"> <span class="bold"> Полуприцеп(гос.знак): </span> <?=$b['']?><br /><br /></div>

	<div class="data_of_birth"> <span class="bold"> Дата рождения:</span> <?=$b['date_of_birth']?><br /></div>
	<div class="place_of_birth"> <span class="bold"> Место рождения:</span> <?=$b['place_of_birth']?><br /><br /></div>

	<div class="passport"> <span class="bold"> Паспорт:</span> <?=$b['passport']?><br /></div>
	<div class="registration"> <span class="bold"> Регистрация:</span> <?=$b['registration']?><br /></div>
	<div class="driver_license"> <span class="bold"> Водительское удостоверение:</span>  <?=$b['drivers_license']?><br /><br /></div>

	<div class="telephone"> <span class="bold"> Телефон:</span> <?=$b['phone']?><br /></div>
</section>
<?php endforeach ?>

</main>

	<!-- <script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->
<!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
</body>
</html>
