<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Клиенты </title>
	<link rel="stylesheet" type="text/css" href="/views/css/main.css">
</head>
<body>

<header> <!-- Сделать отдельной страничкой -->
  <?php include ("views/header.php"); ?>
</header>

<main>

<a href="/customers/add"> Добавить нового контрагента </a> <br /> <br />

<section class="to_list">
	<?php foreach($allCustomers as $a): ?>
		<a href="/customers/view/<?=$a['id']?>"> <?php echo $a['short_name']; ?> </a>
	<?php endforeach ?>
</section>

<?php foreach($oneCustomerName as $b):?>
<section class="left_panel">
	<a href="/customers/edit/<?=$b['id']?>" class="bottom-edit">Редактировать данные компании</a> <br />

	<div class="title"> <span class="bold">Полное наименование компании:</span> <?=$b['name']?> <br /></div>
	<div class="short_title"> <span class="bold">Краткое наименование компании:</span> <?=$b['short_name']?> <br /><br /></div>

	<div class="INN"> <span class="bold">ИНН:</span> <?=$b['INN']?> <br /></div>
	<div class="OGRN"> <span class="bold">ОГРН:</span> <?=$b['OGRN']?> <br /><br /></div>

	<div class="actual_address"><span class="bold"> Фактический адрес:</span> <?=$b['actual_address']?> <br /></div>
	<div class="legal_address"> <span class="bold">Юридический адрес:</span> <?=$b['legal_address']?> <br /></div>
	<div class="mailing_address"> <span class="bold">Почтовый адрес:</span> <?=$b['mailing_address']?> <br /><br /></div>

	<div class="KPP"> <span class="bold">КПП:</span> <?=$b['KPP']?> <br /></div>
	<div class="OKPO_code"> <span class="bold">Код по ОКПО:</span> <?=$b['OKPO_code']?> <br /></div>
	<div class="OKFC_code"> <span class="bold">Код по ОКФС:</span> <?=$b['OKFC_code']?> <br /></div>
	<div class="OKOPF_code"> <span class="bold">Код по ОКОПФ:</span> <?=$b['OKOPF_code']?> <br /></div>
	<div class="OKVED_main_code"> <span class="bold">Код по ОКВЭД (осн):</span> <?=$b['OKVED_main_code']?> <br /><br /></div>

	<div class="CEO"> <span class="bold">Генеральный директор:</span> <?=$b['CEO']?> <br /><br /></div>

	<div class="bank"> <span class="bold">Наименование банка:</span> <?=$b['bank']?> <br /></div>
	<div class="payment_account"> <span class="bold">Рассчетный счет:</span> <?=$b['payment_account']?> <br /></div>
	<div class="correspondent_account"> <span class="bold">Корреспондентский счет:</span> <?=$b['correspondent_account']?> <br /></div>
	<div class="BIK"> <span class="bold">БИК:</span> <?=$b['BIK']?> <br /><br /></div>

	<div class="note"> <span class="bold">Примечание:</span> <?=$b['note']?> <br /><br /></div>

	<div class="contact_name"> <span class="bold"> ФИО:</span> <br /> </div>       <!-- 	Контакт в компании -->
	<div class="contact_position"> <span class="bold"> Должность:</span> <br /> </div>
	<div class="contact_mobile_phone"> <span class="bold"> Мобильный телефон:</span>  <br /></div>
	<div class="contact_e-mail"> <span class="bold"> Электронный адрес:</span>  <br /></div>
	<div class="contact_note"> <span class="bold"> Примечание:</span>  <br /></div> <br /> <br />

	<a href="/customers/delete/<?=$b['id']?>" class="bottom-delete">Удалить компанию</a>
</section>
<?php endforeach ?>
</main>


	<script> document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<!--код для расширения livereload - автоматического обновления страницы сайта после сохранения кода -->
</body>
</html>
