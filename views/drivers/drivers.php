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

<a href="/drivers/add" class="bottom-new"> Добавить нового водителя </a> <br /> <br />

<section class="to_list">
	 <?php foreach($allDriversName as $a): ?>
		 <a href="/drivers/view/<?=$a['id']?>"> <?php echo $a['surname'].' '.$a['first_name'].' '.$a['patronymic']; ?> </a>
	 <?php endforeach ?>
</section>

<?php foreach($oneDriverName as $b):?>
<section class="left_panel">
	<a href="/drivers/edit/<?=$b['id']?>" class="bottom-edit">Редактировать водителя</a> <br />


	<div class="surName"> <span class="bold"> Фамилия:</span> <?=$b['surname']?> <br /></div>
	<div class="firstName"> <span class="bold"> Имя:</span> <?=$b['first_name']?> <br /></div>
	<div class="middleName"> <span class="bold"> Отчество:</span> <?=$b['patronymic']?> <br /><br /></div>

	<div class="data_of_birth"> <span class="bold"> Дата рождения:</span> <?=date("j.m.Y", strtotime($b['date_of_birth']))?><br /></div>
	<div class="place_of_birth"> <span class="bold"> Место рождения:</span> <?=$b['place_of_birth']?><br /><br /></div>

	<div class="passport"> <span class="bold"> Паспорт:</span> <?=$b['passport']?><br /></div>
	<div class="registration"> <span class="bold"> Регистрация:</span> <?=$b['registration']?><br /></div>
	<div class="driver_license"> <span class="bold"> Водительское удостоверение:</span>  <?=$b['drivers_license']?><br /><br /></div>

	<div class="telephone"> <span class="bold"> Телефон 1:</span> <?=$b['phone_1']?><br /></div>
	<div class="telephone"> <span class="bold"> Телефон 2:</span> <?=$b['phone_2']?><br /></div>
	<div class="telephone"> <span class="bold"> Телефон 3:</span> <?=$b['phone_3']?><br /></div> <br /> <br />

	<a href="/drivers/delete/<?=$b['id']?>" class="bottom-delete">Удалить водителя</a>

</section>
<?php endforeach ?>

</main>

	<!-- <script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script> -->
<!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
</body>
</html>
