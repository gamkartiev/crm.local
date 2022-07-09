<?php

class Prr extends Base
{
//---------------------------------------------//
//функция getAllSalaryMonthSelect дублируется с такой же в salaryMoodels
//Это правая боковая панель с месяцами и годами, которые ездили ТС
  public function getAllMonthSelect() {
    $table = 'flights';
    $rows = 'date_2';
    $join =	'';
    $where = '';
    $order = 'date_2 DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    //Получить весь список месяцев
    for ($i=0; $i < count($result); $i++) {
        $res[] = $result[$i]['date_2'];
    }

    //разделить этот список по месяцам и годам, убрав даты
    for($i=0; $i < count($res); $i++) {
      $res[$i] = date('M Y', strtotime($res[$i]));
    }

    //убираем повторяющиеся данные в массиве и обновляем список ключей
    $res = array_unique($res);
    $result = array_values($res);

    return $result;
  }


//функция, что должна вызываться в контроллере и
//что должна конвертировать числовой формат даты в текстовый
//для боковой панели страницы
  public function getStringFormatDate($allPrrMonth){
    for($i=0; $i < count($allPrrMonth); $i++) {
      $res[$i] = date('Y-m', strtotime($allPrrMonth[$i]));
      $result[$i] = [$res[$i], $allPrrMonth[$i]];
    }

    return $result;
  }


  public function getOneMonth($id) {
    $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
    $getOnlyYear = (int)$getOnlyYear = substr($id, 0);

    $endMonth = cal_days_in_month(CAL_GREGORIAN, $getOnlyMonth, $getOnlyYear);

    $table = 'flights';
    $rows = 'id, date_1, date_2, driver';
    $join =	'';
    $where = 'date_2 >= '.'"'."$id-01".'"'." AND " .'date_2 <='.'"'.$id.'-'."$endMonth".'"';
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
 }


// возврат дней, в котором работал водитель
 public function getDailyDays($id, $oneMonth){
   //узнаем год и месяц из этого id
   $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
   $getOnlyYear = (int)$getOnlyYear = substr($id, 0);

   //количество рабочих дней в месяце.
   $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $getOnlyMonth, $getOnlyYear);

   $dayPrr = array();


    $table = 'working_days_drivers';
    $rows = 'working_days_drivers.id, id_drivers, drivers.driver, event, start, the_end';
    $join =	' INNER JOIN drivers ON id_drivers = drivers.id';
    $where = ''; // тут добавить условия месяца, который нам нужен
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

var_export($result);

// 1. сначала вычисляем в какие дни водитель не работал
// сводим события по каждому водителю в одну строку (один водитель = один подмассив)
// for ($i=0; $i < count($result); $i++) {
//   for ($j=0; $j < count($result)+1; $j++) {
//     if($result[$i]['id_drivers'] == $result[$j]['id_drivers']) {
//       // создать новый массив
//       $res = $result[]
//     }
//   }
// }


// 2. потом вычсиляем в какие дни водитель работал
// 3. добавляем к этому массиву стоимость суточных в этот день
  // for ($i=0; $i < count($result); $i++) {
  //   for ($j=0; $j < ; $j++) {
  //     // code...
  //   }
  // }


// делаем запросы в бд в События и получаем eventDate[day.month.year]  - даты,
// в которых происходили события "выходной"
// for ($i=0; $i < $numberOfDaysInMonth; $i++) {
//    for ($j=0; $j < eventDate[day]; $j++) {
//       if (numberOfDayInMonth[$i] != eventDate[$j]) {
//            $result = numberOfDayInMonth[$i]; // это дни, и это должен быть ряд/массив, с перечислением
//                                              // цифер, чтобы туда добавить в конце месяц и год
//        }
//    }

//Мы должны получить водителя и дни в которых он работал.

   // return $result;
 }

//возврат функции с учетом стоимости каждого дня работы (сумма суточных)
// должны получить водителя, дни в которых он работал и сумма суточных в эти дни и результатирующая
// сумма суточных за этот месяц (?)
public function getCostDailyDays($dayPrr, $costDaily){

}

  public function getAllSelect() {
    $table = 'flights';
    $rows = 'id, date_1, date_2, driver';
    $join =	'';
    $where = '';
    $order = 'driver, date_1';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }

//--------------------------------------------------///





  public function getAlleventsSelect() {
    $table = 'working_days_drivers';
    $rows = 'working_days_drivers.id as id, id_drivers,
            event, start, the_end, drivers.id as drivers_id, drivers.driver';
    $join =	' LEFT JOIN drivers ON id_drivers = drivers.id';
    $where = '';
    $order = 'the_end DESC';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
  }


  //добаление нового события (например, выходного для водителя)
  public function getInsert($values){
    $table = 'working_days_drivers';
    $rows = 'id_drivers, event, start, the_end';

    $base = new Base();
    $base->insert($table, $values, $rows);
  }


  public function getDriversSelect() {
  	$table = 'drivers';
  	$rows = 'id, driver';
  	$join = '';
  	$where = '';
  	$order = 'driver DESC';

  	$base = new Base();
  	$result = $base->select($table, $rows, $join, $where, $order);

  	return $result;
  }


  public function deleteEvent($id){
    $table = 'working_days_drivers';
    $where = 'id='.(int)$id;

    $base = new Base();
    $base->delete($table, $where);
  }

}
