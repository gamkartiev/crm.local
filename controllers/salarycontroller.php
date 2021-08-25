<?php

/*--------------*/
class SalaryController extends controller
{
  //-------выведение всех строк------//
  public function view($id) {
    $salary = new Salary();
    $allSalaryMonth = $salary->getAllSelect(); // боковая панель-список из годов + месяцев
    $oneMonth = $salary->getOneMonth($id); //информация об одном месяце


    // var_export($allSalaryMonth);
    // var_export($all = $allSalaryMonth[0]);

    // $count = count($allSalaryMonth);
    // var_export($id);

    include("views/salary/salary.php");
  }
}



 ?>
