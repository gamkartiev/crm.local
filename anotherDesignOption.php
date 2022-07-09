<p class="table" >
	<p class="firstRow tr">
		<p class="th col_1"> Дата загрузки </p>
		<p class="th col_2"> Дата выгрузки </p>
		<p class="th col_3"> Откуда</p>
		<p class="th col_4"> Куда</p>

		<p class="th col_5"> Заказчик</p>

		<p class="th col_6"> Груз</p>
		<p class="th col_7"> Объем </p>
		<p class="th col_8"> Вес</p>
		<p class="th col_9"> Цена </p>
		<p class="th col_10"> Форма оплаты </p>

		<p class="th col_11"> Машина </p>

		<p class="th col_12"> Доверенность </p>
		<p class="th col_13"> Заявка </p>
		<p class="th col_14"> Примечание</p>

		<p class="th col_15"> Водитель </p>
		<p class="th col_16"> Оплата водителю </p>
	</p>
	<?php
	foreach($allFlights as $a): ?>
		<a href="/flights/view/<?=$a['id']?>">
		<p class="row tr">
			<p class="td col_1">  <?=date("j.m.Y",strtotime($a['date_1']))?></p>
			<p class="td col_2"> <?=date("j.m.Y",strtotime($a['date_2']))?> </p>
			<p class="td col_3"> <?=$a['place_1']?> </p>
			<p class="td col_4"> <?=$a['place_2']?> </p>

			<p class="td col_5"> <?=$a['short_name']?> </p>

			<p class="td col_6"> <?=$a['freight']?> </p>
			<p class="td col_7"> <?=$a['volume']?> </p>
			<p class="td col_8"> <?=$a['weight']?> </p>
			<p class="td col_9"> <?=$a['cost']?> </p>
			<p class="td col_10"> <?=$a['form_of_payment']?> </p>

			<p class="td col_11"> <?=$a['car']?> </p>

			<p class="td col_12"> <?=$a['proxy']?> </p>
			<p class="td col_13"> <?=$a['request']?> </p>
			<p class="td col_14"> <?=$a['note']?> </p>

			<p class="td col_14"> <?=$a['driver']?> </p>
			<p class="td col_15"> <?=$a['drivers_payment']?> </p>
		</p>
		</a>
<?php endforeach; ?>
</p>




.firstRow {
	width: 100%;
	display: table-row;
	float: left;
	margin: 0;
}

.th	{
	float: left;
	display: table-cell;
	padding: 2px 5px;
	text-align: center;
	height: 36px;
}

.row {
	width: 100%;
	display: table-row;
	float: left;
	margin: 0;
	text-decoration: none;
}

.td{
	float: left;
	text-align: center;
	display: table-cell;
	padding: 2px 5px;
	height: 36px;
}


.col_1 {width: 70px;}
.col_2 {width: 70px;}
.col_3 {width: 130px;}
.col_4 {width: 130px;}

.col_5 {width: 125px;}
.col_6 {width: 80px;}
.col_7 {width: 50px;}
.col_8 {width: 30px;}

.col_9 {width: 45px;}
.col_10 {width: 48px;}
.col_11 {width: 100px;}
.col_12 {width: 100px;}

.col_13 {width: 85px;}
.col_14 {width: 140px;}
.col_15 {width: 80px;}
.col_16 {width: auto;}
.col_17 {width: 50px; margin-left: 15px;}

.col_17 a:hover, .col_15 a:hover{
	background: rgba(255,255,255,0.4);
	color: black;
}





//////////// Flights_one  /////////////////////


<p class="table" >
	<p class="firstRow tr">
		<b>
		<p class="th col_1"> Дата загрузки </p>
		<p class="th col_2"> Дата выгрузки </p>
		<p class="th col_3"> Откуда</p>
		<p class="th col_4"> Куда</p>

		<p class="th col_5"> Заказчик</p>

		<p class="th col_6"> Груз</p>
		<p class="th col_7"> Объем </p>
		<p class="th col_8"> Вес</p>
		<p class="th col_9"> Цена </p>
		<p class="th col_10"> Форма оплаты </p>

		<p class="th col_11"> Машина </p>

		<p class="th col_12"> Доверенность </p>
		<p class="th col_13"> Заявка </p>
		<p class="th col_14"> Примечание</p></b>

		<p class="th col_15"> Водитель </p>
		<p class="th col_16"> Оплата водителю </p>
	</p>
	<p class="row tr">
		<p class="td col_1">  <?=date("j.m.Y",strtotime($oneFlights['0']['date_1']))?></p>
		<p class="td col_2"> <?=date("j.m.Y",strtotime($oneFlights['0']['date_2']))?> </p>
		<p class="td col_3"> <?=$oneFlights['0']['place_1']?> </p>
		<p class="td col_4"> <?=$oneFlights['0']['place_2']?> </p>


		<p class="td col_5"> <?=$oneFlights['0']['short_name']?> </p>

		<p class="td col_6"> <?=$oneFlights['0']['freight']?> </p>
		<p class="td col_7"> <?=$oneFlights['0']['volume']?> </p>
		<p class="td col_8"> <?=$oneFlights['0']['weight']?> </p>
		<p class="td col_9"> <?=$oneFlights['0']['cost']?> </p>
		<p class="td col_10"> <?=$oneFlights['0']['form_of_payment']?> </p>

		<p class="td col_11"> <?=$oneFlights['0']['car']?> </p>

		<p class="td col_12"> <?=$oneFlights['0']['proxy']?> </p>
		<p class="td col_13"> <?=$oneFlights['0']['request']?> </p>
		<p class="td col_14"> <?=$oneFlights['0']['note']?> </p>

		<p class="td col_15"> <?=$oneFlights['0']['driver']?> </p>
		<p class="td col_15"> <?=$oneFlights['0']['drivers_payment']?> </p>

		<p class="td col_16"> <a href="/flights/edit/<?=$id?>" class="bottom-edit"> Редактировать рейс </a> </p>
		<p class="td col_17"> <a href="/flights/delete/<?=$id?>" class="bottom-edit"> Удалить рейс </a> </p>
	</p>
</p>
