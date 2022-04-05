<?php

/*--------------*/
class SalaryController extends controller
{
  //-------выведение всех строк------//
  public function view($id) {
    $salary = new Salary();
    $allSalaryMonth = $salary->getAllSelect(); // боковая панель-список из годов + месяцев
    $lastMonth = $salary->getLastMonth();

// Создать отдельную функцию для получения нормального id
// Структурировать так, чтобы было одно id (без lastMonth и т.д.)
    if(empty($id)) {
      $id = $lastMonth;
    }

    //информация с зп об одном месяце
    $oneMonth = $salary->getOneMonth($id); //за один месяц зп
    // var_export($oneMonth);
  //  $prr = $salary->getPrr($id, $oneMonth); //суточные
    $premium = $salary->getPremium(); //премия
    $fines = $salary->getFines($id); //штрафы

    //месяц с учетом премий:
    $oneMonth = $salary->getMonthWithPremium($premium, $oneMonth);

    // выкидываем те штрафы, водители которых не получают зп на этом месяцев
    // в следующий месяц, т.е. меняем у них hold_date
    // нужно менять только единомоментно
    // $excessFinesNextMonth = $salary->excessFinesNextMonth($fines, $oneMonth);

// var_export($excessFinesNextMonth);

    //месяц с учетом штрафы и премий:
    $oneMonth = $salary->getMonthWithFines($fines, $oneMonth);

// var_export($id);
    include("views/salary/salary.php");
  }





}
