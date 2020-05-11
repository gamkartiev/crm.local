<div class="table">
	<div class="firstRow"> <!--tr строка-->
		<div class="th col_1"> Дата загрузки </div> <!--th заголовок-->
		<div class="th col_2"> Дата выгрузки </div>
		<div class="th col_3"> Откуда</div>
		<div class="th col_4"> Куда</div>

		<div class="th col_5"> Заказчик</div>
		<!-- <div class="th"> Логист </div class="th"> -->

		<div class="th col_6"> Груз</div>
		<div class="th col_7"> Объем </div>
		<div class="th col_8"> Вес</div>
		<div class="th col_9"> Цена </div>
		<div class="th col_10"> Форма оплаты </div>

		<div class="th col_11"> Водитель</div>
		<div class="th col_12"> Машина </div>
		<div class="th col_13"> Полуприцеп </div>

		<div class="th col_14"> Доверенность </div>
		<div class="th col_15"> Заявка </div>
		<div class="th col_16"> Примечание</div>
	</div> <!--tr строка-->

	<?php	foreach($allFlights as $a): ?>
	<div class="row"> <!--tr строка-->
		<div class="td col_1"> <?=$a['date_1']?> </div> <!--td столбец-->
		<div class="td col_2"> <?=$a['date_2']?> </div>
		<div class="td col_3"> <?=$a['place_1']?> </div>
		<div class="td col_4"> <?=$a['place_2']?> </div>

		<div class="td col_5"> <?=$a['short_name']?> </div>

		<div class="td col_6"> <?=$a['freight']?> </div>
		<div class="td col_7"> <?=$a['volume']?> </div>
		<div class="td col_8"> <?=$a['weight']?> </div>
		<div class="td col_9"> <?=$a['cost']?> </div>
		<div class="td col_10"> <?=$a['form_of_payment']?> </div>

		<div class="td col_11"> <?=$a['surname']?> </div>
		<div class="td col_12"> <?=$a['model_cars']?> </div>
		<div class="td col_13"> <?=$a['attached_trailer']?> </div>

		<div class="td col_14"> <?=$a['proxy']?> </div>
		<div class="td col_15"> <?=$a['request']?> </div>
		<div class="td col_16"> <?=$a['note']?> </div>
	</div> <!--tr строка-->
	<?php endforeach; ?>
</div> <!-- /table -->
