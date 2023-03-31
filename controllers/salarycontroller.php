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

    // выкидываем те штрафы, водители которых не получают зп на этом месяцев
    // в следующий месяц, т.е. меняем у них hold_date
    // нужно менять только единомоментно
    // $excessFinesNextMonth = $salary->excessFinesNextMonth($fines, $oneMonth);


    include("views/salary/salary.php");
  }

  // добавление фактически оплаченных суточных
  public function add_prr_paid($id){

    $salary = new Salary();

    $numberOfDaysInMonth = $salary->numberOfDaysInMonth($id);
    $oneMonth = $salary->getOneMonth($id, $numberOfDaysInMonth); //за один месяц зп

    for ($i=0; $i < count($oneMonth); $i++) {
      $id_drivers = $oneMonth[$i]['id_drivers'];
      $checkPaid = $salary->checkPaidPrr($id, $id_drivers);
      // если на этих водителей и на этот месяц нет выплаченных суточных в бд.
      // то создаем нулевую строку на каждого водителя с суммой выплаченных
      // суточных равным нулю и на первое число этого месяца
      // if(empty($checkPaid)){
      //
      // }
      var_export($checkPaid);
    }

  var_export($checkPaid);
  // var_export($oneMonth);
    include("views/salary/prrPaidFormEdit.php");
    // include("/salary/prrPaidFormEdit.php/$id");
  }

  // добавление Прочих работ выполненных в течении месяца
  public function add_other_works($id){}





}
