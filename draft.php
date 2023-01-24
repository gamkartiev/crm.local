
<form class="prrFormEdit" action="/prr/edit/<?=$id?>" method="post">
<?php
	$massive = array(array ("drivers" => "Вершинников", "id" => "1", "month_and_years"=>"2022-02-01", "1"=>"700", "2"=>"0", "3"=>"700"),
									 array ("drivers" => "Иванов", "id" => "2","month_and_years"=>"2022-02-01", "1"=>"700", "2"=>"700", "3"=>"700"),
									 array ("drivers" => "Акушеров", "id" => "3","month_and_years"=>"2022-02-01", "1"=>"0", "2"=>"0", "3"=>"700"));
?>

<table>
<tr>
	<th> Водители </th>
	<?php	for ($k=1; $k <= 3; $k++) { ?>
	<td> <!-- столбцы с датами месяца -->
		<?php echo $k;
		} ?>
	</td>
</tr>

<?php for ($j=0; $j < count($massive); $j++) { ?>
<tr>
	<th> <? echo $massive[$j]['drivers']; ?> </th> <!-- список водителей -->
			<input type="hidden" name="<?="drivers ".$j?>" value="<?=$massive[$j]['id']?>">
	<?php for ($i=1; $i <= 3; $i++) {	?>
	<td> <input type="text" name="<?=$massive[$j]['id']."_".$i ?>" value="<?=$massive[$j][$i] ?>">	</td>
	<?php } ?>
</tr>

<?php } ?>
</table>						<br />

<button type="submit" name="button"> Добавить </button>

</form>


<input type="hidden" name="<?="drivers ".$j?>" value="<?=$getLastMonthPrr[$j]['id']?>">
