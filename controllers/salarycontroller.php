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
    //информация с зп об одном месяце
    $oneMonth = $salary->getOneMonth($id, $numberOfDaysInMonth); //за один месяц зп

    // $prr = $salary->getPrr($id, $oneMonth); //суточные
    $premium = $salary->getPremium(); //премия
    $fines = $salary->getFines($id, $numberOfDaysInMonth); //штрафы

    // месяц с учетом премий:
    $oneMonth = $salary->getMonthWithPremium($premium, $oneMonth);

    // выкидываем те штрафы, водители которых не получают зп на этом месяцев
    // в следующий месяц, т.е. меняем у них hold_date
    // нужно менять только единомоментно
    // $excessFinesNextMonth = $salary->excessFinesNextMonth($fines, $oneMonth);

    // месяц с учетом штрафы и премий:
    $oneMonth = $salary->getMonthWithFines($fines, $oneMonth);

    include("views/salary/salary.php");
  }





}
