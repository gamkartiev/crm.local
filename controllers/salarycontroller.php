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





}
