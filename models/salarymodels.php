<?php

class Salary extends Base
{

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


//возвращает количество дней в месяце (для таблицы ПРР)
 public function numberOfDaysInMonth($id){
  $getOnlyMonth=(int)$getOnlyMonth = substr($id, 5, 2);
  $getOnlyYear = (int)$getOnlyYear = substr($id, 0);

  //количество рабочих дней в месяце.
  $result = cal_days_in_month(CAL_GREGORIAN, $getOnlyMonth, $getOnlyYear);

  return $result;
 }


 // последний месяц, где работали водители
public function getLastMonthDriversWork(){
 $table = 'prr_drivers';
 $rows = 'month_and_years';
 $join =	'';
 //запрос включает: те рейсы, что загружались в прошлом месяце и выгружались в запрашиваемом месяцев
 // а также, те рейсы, что загружались в этом месяце и выгружались в запрашиваемом
 $where = '';
 $order = 'month_and_years DESC limit 1';

 $base = new Base();
 $result = $base->select($table, $rows, $join, $where, $order);

 $result = $result[0]['month_and_years'];
 $result = substr($result, 0, 7); //убираем день месяца

 return $result;
}


public function getOneMonth($id, $numberOfDaysInMonth) {
  $table = 'flights';
  $rows = 'flights.id, flights.date_2, flights.id_drivers, SUM(flights.drivers_payment) AS cost, drivers.driver';
  $join =	' LEFT OUTER JOIN drivers ON flights.id_drivers = drivers.id';
  $where = 'date_2 >= '. '"'."$id-01".'"' ." AND " . 'date_2 <='. '"'."$id".'-'.
            "$numberOfDaysInMonth".'"'.' GROUP BY drivers.driver';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
// var_export($result);

  return $result;
  }


//--------------- ПРР -----------------//
public function getPrr($id, $numberOfDaysInMonth){
  $table = 'prr_drivers';
  $rows = 'prr_drivers.drivers AS id_drivers,
            prr_drivers.month_and_years,
            (prr_drivers.1 + prr_drivers.2 + prr_drivers.3 + prr_drivers.4 + prr_drivers.5 +
            prr_drivers.6 + prr_drivers.7 + prr_drivers.8 + prr_drivers.9 + prr_drivers.10 +
            prr_drivers.11 + prr_drivers.12 + prr_drivers.13 + prr_drivers.14 + prr_drivers.15 +
            prr_drivers.16 + prr_drivers.17 + prr_drivers.18 + prr_drivers.19 + prr_drivers.20 +
            prr_drivers.21 + prr_drivers.22 + prr_drivers.23 + prr_drivers.24 + prr_drivers.25 +
            prr_drivers.26 + prr_drivers.27 + prr_drivers.28 + prr_drivers.29 + prr_drivers.30 +
            prr_drivers.31) AS prr,
            drivers.driver';
  $join =	' INNER JOIN drivers ON prr_drivers.drivers = drivers.id';
  $where = ' month_and_years = '.'"'."$id-01".'"'.' GROUP BY driver, month_and_years';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}

public function getMonthWithPrr($prr, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['prr' => '0'];
    for ($j=0; $j < count($prr); $j++) {
        if($oneMonth[$i]['id_drivers'] == $prr[$j]['id_drivers']){
          $oneMonth[$i]['prr'] += $prr[$j]['prr'];
          }
       }
      }
  // var_export($oneMonth);

  return $oneMonth;
}
//--------------- End ПРР -----------------//



//-------------------- Премия ----------------------//
public function getPremium(){
  $table = 'drivers_premium';
  $rows = '*';
  $join =	'';
  $where = '';
  $order = 'id DESC LIMIT 1';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
  return $result;
}

//Учет премии, если она водителям должна начисляться
public function getMonthWithPremium($premium, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    if($oneMonth[$i]['cost'] > $premium[0]['total_premium']){
        $oneMonth[$i]['percent'] = $premium[0]['premium'];
        $oneMonth[$i]['cost_and_percent'] = $oneMonth[$i]['cost'] + (($oneMonth[$i]['cost'] * $premium[0]['premium'])/100);
      }else{
        $oneMonth[$i]['percent'] = 0;
        $oneMonth[$i]['cost_and_percent'] = $oneMonth[$i]['cost'];
      }
     }
 return $oneMonth;
}
//--------------- End премия -----------------//



//------------------ Штрафы -----------------------//
public function getFines($id, $numberOfDaysInMonth){
  $table = 'fines';
  $rows = 'fines.id, fines.id_drivers, hold_date, to_pay, due_date, drivers.driver';
  $join = ' LEFT OUTER JOIN drivers ON fines.id_drivers = drivers.id';
  $where = 'hold_date >= '. '"'."$id-01".'"' ." AND ". 'hold_date <='. '"'."$id".'-'."$numberOfDaysInMonth".'"';
  $order = 'due_date ASC';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}

public function getMonthWithFines($fines, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['fines'=> '0'];
    for ($j=0; $j < count($fines); $j++) {
        if($oneMonth[$i]['id_drivers'] == $fines[$j]['id_drivers']){
          $oneMonth[$i]['fines'] += $fines[$j]['to_pay'];
          }
       }
      }
  // var_export($oneMonth);
  return $oneMonth;
}
//--------------- End штрафы -----------------//


//-------- Лишние штрафы в следующий месяц -----------//
// проблема - закидывает при каждом обновлнии страницы salary на месяц вперед
// надо еще вставить условие сравнения, чтобы +1 месяц не закидывало вперед
// или hold_date устанавливать вручную
public function excessFinesNextMonth($fines, $oneMonth){
  for ($i=0; $i < count($fines); $i++) {
    for ($j=0; $j < count($oneMonth); $j++) {
        if($fines[$i]['driver'] != $oneMonth[$j]['driver']){ //тут поменять на id водителя
          //дальше можно возвратить просто массив, чтобы потом вызвать
          // функцию update, а можно не заморачиваться и ред-ть из этой фун-ии
          $id = $fines[$i]['id'];
          $date = $fines[$i]['hold_date'];
   // var_export($date);
          $dateAt = strtotime("+1 month", strtotime($date));


          $values[$i] = date('Y-m-d', $dateAt);
 // var_export($values);
          $table = 'fines';
          $rows = array("hold_date");
          $where = 'id='.(int)$id;
 // var_export($rows);
          // $base = new Base();
          // $base->update($table, $rows, $where, $values);

         }
     }
  }
}


//////--------------Все связанное с add_prr_paid------------///////
// выборка всех выплаченных ПРР за N-ый месяц
public function getPrrPaid($id){
  $table = 'prr_paid';
  $rows = 'prr_paid.id AS id_prr_paid, prr_paid.id_drivers, prr_paid.month_and_years,
           prr_paid.date_prr_paid, prr_paid.sum_prr_paid';
  $join = '';
  $where = ' month_and_years='."'".$id.'-01'."'";
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


//проверка - есть ли связанные с этим водителем и этим месяцем ПРР(суточные) в бд
public function checkPaidPrr($id, $id_drivers){
  $table = 'prr_paid';
  $rows = 'prr_paid.id, prr_paid.id_drivers, prr_paid.month_and_years,
            prr_paid.date_prr_paid, prr_paid.sum_prr_paid';
  $join = '';
  $where = ' id_drivers='.$id_drivers. " AND " . 'month_and_years='. "'" .$id.'-01'. "'";
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


//////---------Добавить нулевое ПРР если раньше там было пусто---------------////////
public function setZeroPaidPrr($values){
 $table = 'prr_paid';
 $rows = 'id_drivers, month_and_years, date_prr_paid, sum_prr_paid';

 $base = new Base();
 $result = $base->insert($table, $values, $rows);

 return $result;
}


// добавить/изменить ПРР выплаченные
public function setEditPrrPaid($id_prr_paid, $values){
$table = 'prr_paid';
$rows = array("month_and_years", "date_prr_paid", "sum_prr_paid");
$where = ' id='.(int)$id_prr_paid;

$base = new Base();
$base->update($table, $rows, $where, $values);
// var_export($base);
}


public function getMonthWithPaidPrr($prr_paid, $oneMonth){
for ($i=0; $i < count($oneMonth); $i++) {
  $oneMonth[$i] += ['sum_prr_paid'=>' ', 'date_prr_paid'=>' '];
  $oneMonth[$i] += ['id_prr_paid'=> ''];
  for ($j=0; $j < count($prr_paid); $j++) {
      if($oneMonth[$i]['id_drivers'] == $prr_paid[$j]['id_drivers']){
        $oneMonth[$i]['id_prr_paid'] .= $prr_paid[$j]['id_prr_paid'];
        $oneMonth[$i]['sum_prr_paid'] .= $prr_paid[$j]['sum_prr_paid'];
        $oneMonth[$i]['date_prr_paid'] .= $prr_paid[$j]['date_prr_paid']; // тут добавление точкой
        // так как иначе возникает ошибка Notice: A non well formed numeric value encountered in
        // т.к. += - это сложение
        }
     }
    }
// var_export($oneMonth);
return $oneMonth;
}


//////********** Это прочие работы ***********/////////
public function getInsert($values) {
  $table = 'drivers_other_works';
  $rows = 'id_drivers, sum, date_of_work, status, note';

  $base = new Base();
  $base->insert($table, $values, $rows);
}


public function getEdit($id, $values) {
  $table = 'drivers_other_works';
  $rows = array("id_drivers", "sum", "date_of_work", "status", "note");
  $where = 'drivers_other_works.id='.(int)$id;

  $base = new Base();
  $base->update($table, $rows, $where, $values);
}


//фун-я выборки всех водителей для Формы вставки нового рейса
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

public function getFirstItemDrivers($drivers, $oneSelect){
  for ($i=0; $i < count($drivers); $i++) {
    if( $oneSelect[0]['id_drivers']===$drivers[$i]['id']) {
      $selectItem = array_slice($drivers, $i, 1);         //скопировать нужный элемент массива
      $deleteItemInArray = array_splice($drivers, $i, 1);  //удалить тот элемент массиве, что мы выбрали
      $drivers = array_merge($selectItem, $drivers);        //объед-ть 2 массива, 1-м поставив скопированный массив
      }
    }
  return $drivers;
}


//фун-я выборки статусов (оплачено или нет)
public function getStatusSelect() {
  $table = 'configuration';
  $rows = 'id, status';
  $join = '';
  $where = '';
  $order = 'id ASC LIMIT 2';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}

//проверка - есть ли связанные с этим водителем и этим месяцем ПРР(суточные) в бд
public function checkDriversOtherWorks($id, $id_drivers){
  $table = 'drivers_other_works';
  $rows = 'id_drivers, sum, date_of_work, id_status, note';
  $join = '';
  $where = " id_drivers=".$id_drivers." AND " .
           " date_of_work >= " . '"'."$id-01".'"' ." AND ". "date_of_work <= " . '"'."$id-31".'"';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


//////---------Добавить нулевое ПРР если раньше там было пусто---------------////////
public function setZeroDriversOtherWorks($values){
 $table = 'drivers_other_works';
 $rows = 'id_drivers, sum, date_of_work, status, note';

 $base = new Base();
 $result = $base->insert($table, $values, $rows);

 return $result;
}

// выборка всех выплаченных ПРР за N-ый месяц
public function getDriversOtherWorks($id){
  $table = 'drivers_other_works';
  $rows = 'id AS id_driversOtherWorks, id_drivers, sum, date_of_work, id_status, note';
  $join = '';
  $where = " date_of_work >= " . '"'."$id-01".'"' ." AND ". "date_of_work <= " . '"'."$id-31".'"';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);
// var_export($result);
  return $result;
}


//!!!!!!!!! - проблемный
public function getMonthWithDriversOtherWorks($driversOtherWorks, $oneMonth){
for ($i=0; $i < count($oneMonth); $i++) {
  $oneMonth[$i] += ['id_driversOtherWorks'=> '', 'sum_not_paid_driversOtherWorks'=> 0,
                    'sum_paid_driversOtherWorks'=> 0, 'date_driversOtherWorks'=> '',
                    'id_status_driversOtherWorks'=> '', 'note_driversOtherWorks'=> '', ];

  for ($j=0; $j < count($driversOtherWorks); $j++) {
    // тут добавление точкой так как иначе возникает ошибка Notice: A non well
    // formed numeric value encountered in    т.к. += - это сложение

    //выборка из не оплаченных Прочих работ:
      if($oneMonth[$i]['id_drivers'] == $driversOtherWorks[$j]['id_drivers']
          AND $driversOtherWorks[$j]['id_status'] == 2 ){
        $oneMonth[$i]['sum_not_paid_driversOtherWorks'] += $driversOtherWorks[$j]['sum'];
        $oneMonth[$i]['date_driversOtherWorks'] .= $driversOtherWorks[$j]['date_of_work'];
        $oneMonth[$i]['id_status_driversOtherWorks'] .= $driversOtherWorks[$j]['id_status'];
        $oneMonth[$i]['note_driversOtherWorks'] .= $driversOtherWorks[$j]['note'];
        $oneMonth[$i]['id_driversOtherWorks'] .= $driversOtherWorks[$j]['id_driversOtherWorks'];
      }
      //выборка из оплаченных Прочих работ:
      if($oneMonth[$i]['id_drivers'] == $driversOtherWorks[$j]['id_drivers']
          AND $driversOtherWorks[$j]['id_status'] == 1 ){
        $oneMonth[$i]['sum_paid_driversOtherWorks'] += $driversOtherWorks[$j]['sum'];
        $oneMonth[$i]['date_driversOtherWorks'] .= $driversOtherWorks[$j]['date_of_work'];
        $oneMonth[$i]['id_status_driversOtherWorks'] .= $driversOtherWorks[$j]['id_status'];
        $oneMonth[$i]['note_driversOtherWorks'] .= $driversOtherWorks[$j]['note'];
        $oneMonth[$i]['id_driversOtherWorks'] .= $driversOtherWorks[$j]['id_driversOtherWorks'];
      }
     }
    }
// var_export($oneMonth);
return $oneMonth;
}

////**************** ****************/////

//---------- "ПРОЧИЕ ШТРАФЫ" ----------------//
//проверка - есть ли связанные с этим водителем и этим месяцем "Прочие штрафы" в бд
public function checOtherFines($id, $id_drivers){
  $table = 'fines_other';
  $rows = 'id_drivers, sum, date, note';
  $join = '';
  $where = " id_drivers=".$id_drivers." AND " .
           " date >= " . '"'."$id-01".'"' ." AND ". "date <= " . '"'."$id-31".'"';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}

//////---------Добавить нулевое "Прочие штрафы", если раньше там было пусто---------------////////
public function setZeroOtherFines($values){
   $table = 'fines_other';
   $rows = 'id_drivers, sum, date, note';

   $base = new Base();
   $result = $base->insert($table, $values, $rows);

   return $result;
}

// ---------- Получить "Прочие штрафы" с бд -------------//
public function getOtherFines($id){
    $table = 'fines_other';
    $rows = 'id, id_drivers, sum, date, note';
    $join =	'';
    $where = " date >= ". '"' ."$id-01". '"' ." AND ". "date <= " . '"' ."$id-31".'"';
    $order = '';

    $base = new Base();
    $result = $base->select($table, $rows, $join, $where, $order);

    return $result;
}

// ------------- объединить "Прочие штрафы" с общей строкой ------------ //
public function getMonthWithOtherFines($otherFines, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['otherFines'=> '0'];
    $oneMonth[$i] += ['note_otherFines'=> ""];
    $oneMonth[$i] += ['id_otherFines'=> ""];

    for ($j=0; $j < count($otherFines); $j++) {
      //выборка из не оплаченных Прочих работ:
        if($oneMonth[$i]['id_drivers'] == $otherFines[$j]['id_drivers']){
          $oneMonth[$i]['otherFines'] += $otherFines[$j]['sum'];
          $oneMonth[$i]['note_otherFines'] .= $otherFines[$j]['note'];
          $oneMonth[$i]['id_otherFines'] .= $otherFines[$j]['id'];
          }
        }
      }

  return $oneMonth;
}

public function getEditOtherFines($id, $values){
  $table = 'fines_other';
  $rows = array("id_drivers", "sum", "date", "note");
  $where = 'fines_other.id='.(int)$id;

  $base = new Base();
  $base->update($table, $rows, $where, $values);
}


public function getOneSelectOtherFines($id){
  $table = 'fines_other';
  $rows = 'id, id_drivers, sum, date, note';
  $join = '';
  $where = 'fines_other.id='.(int)$id;
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


//--------------- "МОБИЛЬНАЯ СВЯЗЬ" -----------------//
public function getMobile($id, $numberOfDaysInMonth){
  $table = 'prr_drivers';
  $rows = 'prr_drivers.drivers AS id_drivers,
            prr_drivers.month_and_years,
            prr_drivers.1, prr_drivers.2, prr_drivers.3, prr_drivers.4, prr_drivers.5,
            prr_drivers.6, prr_drivers.7, prr_drivers.8, prr_drivers.9, prr_drivers.10,
            prr_drivers.11, prr_drivers.12, prr_drivers.13, prr_drivers.14, prr_drivers.15,
            prr_drivers.16, prr_drivers.17, prr_drivers.18, prr_drivers.19, prr_drivers.20,
            prr_drivers.21, prr_drivers.22, prr_drivers.23, prr_drivers.24, prr_drivers.25,
            prr_drivers.26, prr_drivers.27, prr_drivers.28, prr_drivers.29, prr_drivers.30,
            prr_drivers.31';
  $join =	'';
  $where = ' month_and_years = '.'"'."$id-01".'"';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  $resultWithMobileSum = array();

  for ($i=0; $i < count($result); $i++) {
    $k = 0;
    for ($j=1; $j < ($numberOfDaysInMonth); $j++){
      if(($result[$i][$j]) > 0){ ++$k; };
      }

    $sum=0;
    if ($k >= 9 AND $k <= 20){$sum=300;}
    if ($k >= 20){$sum=600;}

    $resultWithMobileSum[$i] = array('id_drivers'=>$result[$i]['id_drivers'], 'mobile'=>$sum);
  }

    return $resultWithMobileSum;
}

public function getMonthWithMobile($mobile, $oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['mobile'=> '0'];

    for ($j=0; $j < count($mobile); $j++) {
      //выборка из не оплаченных Прочих работ:
        if($oneMonth[$i]['id_drivers'] == $mobile[$j]['id_drivers']){
          $oneMonth[$i]['mobile'] += $mobile[$j]['mobile'];
          }

        }
      }

  return $oneMonth;
}


// функция с для столбца "Расчет доплаты/вычета ПРР":
//Сумма ПРР, что должны были начислить -  Сумма выплаченных ПРР
public function getMonthWithAutoCalcPrr ($oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $prr = $oneMonth[$i]['prr'];
    $sum_prr_paid = $oneMonth[$i]['sum_prr_paid'];
    $AutoCalcPrr = $prr - $sum_prr_paid;

    $oneMonth[$i]['autoCalcPrr'] = "$AutoCalcPrr";
  }
  return $oneMonth;
}

// функция с для столбца "Расчет доплаты Прочие работы":
public function getMonthWithAutoCalcOtherWorks ($oneMonth){
  for ($i=0; $i < count($oneMonth); $i++) {
    $sum_not_paid = $oneMonth[$i]['sum_not_paid_driversOtherWorks'];
    $sum_paid = $oneMonth[$i]['sum_paid_driversOtherWorks'];
    $AutoCalcSumNotPaid = $sum_not_paid - $sum_paid;

    $oneMonth[$i]['autoCalcSumNotPaid'] = "$AutoCalcSumNotPaid";
  }
  return $oneMonth;
}


public function getAllChecks($id){
  $table = 'checks';
  $rows = 'id, id_drivers, sum, date, id_status';
  $join = '';
  $where = 'id_status = 1 AND date >='.'"'."$id-01". '"' ." AND ". "date <=".'"'."$id-31".'"';
  $order = '';

  $base = new Base();
  $result = $base->select($table, $rows, $join, $where, $order);

  return $result;
}


// ------------- объединить "Прочие штрафы" с общей строкой ------------ //
public function getMonthWithAllChecks($oneMonth, $allChecks){
  for ($i=0; $i < count($oneMonth); $i++) {
    $oneMonth[$i] += ['checks'=> '0'];

    for ($j=0; $j < count($allChecks); $j++) {
      //выборка из не оплаченных Прочих работ:
        if($oneMonth[$i]['id_drivers'] == $allChecks[$j]['id_drivers']){
          $oneMonth[$i]['checks'] += $allChecks[$j]['sum'];
          }
        }
      }

  return $oneMonth;
}

}
