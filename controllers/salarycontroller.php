<?php

/*--------------*/
class SalaryController extends controller
{
  //-------выведение всех строк------//
  public function view($id) {
    $salary = new Salary();
    $allSalaryMonth = $salary->getAllMonthSelect(); // боковая панель-список из годов + месяцев
    $allSalaryMonth = $salary->getStringFormatDate($allSalaryMonth); //месяцы в виде чисел

    if(empty($id)){
      $id = $salary->getLastMonthDriversWork();
    }

    $numberOfDaysInMonth = $salary->numberOfDaysInMonth($id);

    $oneMonth = $salary->getOneMonth($id, $numberOfDaysInMonth); //за один месяц зп
// var_export($oneMonth);

    $premium = $salary->getPremium(); //премия
    $oneMonth = $salary->getMonthWithPremium($premium, $oneMonth); //месяц с учетом премий

    $fines = $salary->getFines($id, $numberOfDaysInMonth); //штрафы
    $oneMonth = $salary->getMonthWithFines($fines, $oneMonth); //месяц с учетом штрафов

    $prr = $salary->getPrr($id, $numberOfDaysInMonth);
    $oneMonth = $salary->getMonthWithPrr($prr, $oneMonth); //месяц с учетом ПРР

    // проверка, у каких водителей прописаны оплаченные суточные в бд
    for ($i=0; $i < count($oneMonth); $i++) {
      $id_drivers = $oneMonth[$i]['id_drivers'];
      $checkPaidPrr = $salary->checkPaidPrr($id, $id_drivers);

    // если у водителей нет записей в ПРР оплаченные, то добавить нулевые записи
      if (empty($checkPaidPrr)) {
        $values = array(
          $id_drivers = $oneMonth[$i]['id_drivers'],
          $month_and_years = $id.'-01',
          $date_prr_paid = '0',
          $sum_prr_paid = '0',
        );
        $setZeroPaidPrr = $salary->setZeroPaidPrr($values);
      }
    }

    $prr_paid = $salary->getPrrPaid($id);
    $oneMonth = $salary->getMonthWithPaidPrr($prr_paid, $oneMonth);
var_export($oneMonth);
    // выкидываем те штрафы, водители которых не получают зп на этом месяцев
    // в следующий месяц, т.е. меняем у них hold_date
    // нужно менять только единомоментно
    // $excessFinesNextMonth = $salary->excessFinesNextMonth($fines, $oneMonth);

    include("views/salary/salary.php");
  }

  // добавление фактически оплаченных суточных
  public function add_paid_prr($id){
    if(!empty($_POST) && $id > 0){
    $salary = new Salary();
    // $numberOfDaysInMonth = $salary->numberOfDaysInMonth($id);
    // $oneMonth = $salary->getOneMonth($id, $numberOfDaysInMonth); //за один месяц зп

    //высчитываем сколько массивов должно быть (водители с суточными)
    $removed = array_pop($_POST); //убираем button из вх-го массива на всякий случай
    $date = $id; //чтобы дальше в for id и month_and_years не пересекались
    //делим POST на столько элементов, сколько и водителей в этом месяце
    $value = array_chunk($_POST, 3, true);
// var_export($id);
    for ($i=0; $i < count($value); $i++) {
      $massive[$i] = array(
        "id_prr_paid" => $value[$i]['id_prr_paid_'.$i],
        "month_and_years" => $date.'-01',
        "date_prr_paid" => $value[$i]['date_prr_paid_'.$i],
        "sum_prr_paid" => $value[$i]['sum_prr_paid_'.$i]
      );

      $id_prr_paid = $massive[$i]['id_prr_paid'];
      // var_export($id);

// var_export($massive);
//trim() - обрезать пробелы по краям строки
      $values = array(
        $month_and_years = trim($massive[$i]['month_and_years']),
        $date_prr_paid = trim($massive[$i]['date_prr_paid']),
        $sum_prr_paid = trim((int)$massive[$i]['sum_prr_paid'])
      );
      // var_export($values);
      $salary->setEditPrrPaid($id_prr_paid, $values);
    }
// var_export($values);
// for ($i=0; $i < count($values); $i++) {
  // $values = $values['0'];
  // var_export($values);
  // $salary->setEditPrrPaid($id, $values);
// }


    header("Location: /salary/view/".$id);
  } else {
       $salary = new Salary();
       $numberOfDaysInMonth = $salary->numberOfDaysInMonth($id);
       $oneMonth = $salary->getOneMonth($id, $numberOfDaysInMonth); //за один месяц зп
       $prr_paid = $salary->getPrrPaid($id);
  // var_export($prr_paid);
  // var_export($oneMonth);
       $oneMonth = $salary->getMonthWithPaidPrr($prr_paid, $oneMonth);
// var_export($oneMonth);
      include("views/salary/prrPaidFormEdit.php");
    }
  }


  // добавление Прочих работ выполненных в течении месяца
  public function add_other_works($id){}





}
