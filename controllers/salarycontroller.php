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

    $premium = $salary->getPremium(); //премия
    $oneMonth = $salary->getMonthWithPremium($premium, $oneMonth); //месяц с учетом премий

    $fines = $salary->getFines($id, $numberOfDaysInMonth); //штрафы
    $oneMonth = $salary->getMonthWithFines($fines, $oneMonth); //месяц с учетом штрафов

    $prr = $salary->getPrr($id, $numberOfDaysInMonth);
    $oneMonth = $salary->getMonthWithPrr($prr, $oneMonth); //месяц с учетом ПРР


//-------- START Добавить нулевые значение в ПРР ВЫПЛАЧЕННЫЕ ---------------//
    //проверка, у каких водителей прописаны оплаченные суточные в бд:
  for ($i=0; $i < count($oneMonth); $i++) {
      $id_drivers = $oneMonth[$i]['id_drivers'];
      $checkPaidPrr = $salary->checkPaidPrr($id, $id_drivers);

    // если у водителей нет записей в ПРР оплаченные, то добавить нулевые записи:
      if (empty($checkPaidPrr)) {
        $values = array(
          $id_drivers = $oneMonth[$i]['id_drivers'],
          $month_and_years = $id.'-01',
          $date_prr_paid = ' ',
          $sum_prr_paid = '0',
        );
        $setZeroPaidPrr = $salary->setZeroPaidPrr($values);
      }
    }
//-------- END Добавить нулевые значение в ПРР ВЫПЛАЧЕННЫЕ ---------------//
    $prr_paid = $salary->getPrrPaid($id);
    $oneMonth = $salary->getMonthWithPaidPrr($prr_paid, $oneMonth);




//---------- START Добавить нулевые значение в ПРОЧИЕ РАБОТЫ -----------------//
    // проверка, у каких водителей прописаны Прочие работы в бд:
    for ($i=0; $i < count($oneMonth); $i++) {
      $id_drivers = $oneMonth[$i]['id_drivers'];
      $checkDriversOtherWorks = $salary->checkDriversOtherWorks($id, $id_drivers);

      // если у водителей нет записей в Прочие работы, то добавить нулевые записи:
      if(empty($checkDriversOtherWorks)){
        $values = array(
          $id_drivers = $oneMonth[$i]['id_drivers'],
          $sum = '0',
          $date_of_work = $id.'-01',
          $status = '1', // Статус: Оплачено (из табл бд configuration)
          $note = ' - ',
        );
        $setZeroDriversOtherWorks = $salary->setZeroDriversOtherWorks($values);
      }
    }
//---------- END Добавить нулевые значение в ПРОЧИЕ РАБОТЫ -----------------//

    $driversOtherWorks = $salary->getDriversOtherWorks($id);
    $oneMonth = $salary->getMonthWithDriversOtherWorks($driversOtherWorks, $oneMonth);
// var_export($oneMonth);



//---------- START Добавить нулевые значение в "Прочие штрафы" -----------------//
    // проверка, у каких водителей прописаны "Прочие штрафы" в бд:
    for ($i=0; $i < count($oneMonth); $i++) {
      $id_drivers = $oneMonth[$i]['id_drivers'];
      $checOtherFines = $salary->checOtherFines($id, $id_drivers);

      // если у водителей нет записей в "Прочие штрафы", то добавить нулевые записи:
      if(empty($checOtherFines)){
        $values = array(
          $id_drivers = $oneMonth[$i]['id_drivers'],
          $sum = '0',
          $date = $id.'-01',
          $note = '',
        );
        $setZeroOtherFines = $salary->setZeroOtherFines($values);
      }
    }
//---------- END Добавить нулевые значение в "Прочие штрафы" -----------------//
$otherFines = $salary->getOtherFines($id);
$oneMonth = $salary->getMonthWithOtherFines($otherFines, $oneMonth);
// var_export($otherFines);



//--------- START -- Получить, сумму за мобильную связь ---------- //
  $mobile = $salary->getMobile($id, $numberOfDaysInMonth);
  $oneMonth = $salary->getMonthWithMobile($mobile, $oneMonth);
//--------- END -- Получить, сумму за мобильную связь ---------- //


  //общая функция с автоматическим "Расчетом доплаты/вычета ПРР"(столбец):
$oneMonth = $salary->getMonthWithAutoCalcPrr($oneMonth);
  //автоматически высчитать Прочие работы:
$oneMonth = $salary->getMonthWithAutoCalcOtherWorks($oneMonth);

 //добавить неоплаченные чеки:
$allChecks = $salary->getAllChecks($id);
$oneMonth = $salary->getMonthWithAllChecks($oneMonth, $allChecks);

var_export($oneMonth);
    include("views/salary/salary.php");
  }




///// !!!!!!! ------ В РАБОТЕ -----------------------------////
public function edit_other_fines($id) {
  if(!empty($_POST)&& $id > 0) {
    $salary = new Salary();

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $sum = $_POST['sum'],
      $date = $_POST['date'],
      $note = $_POST['note']
    );

    $salary->getEditOtherFines($id, $values);

    $date = substr($_POST['date'], 0, 7); //извлекаем из гггг-мм-дд только ггг-мм
    header("Location: /salary/view/$date");
  } else {
    $salary = new Salary();
    $oneSelect = $salary->getOneSelectOtherFines($id);

    $drivers = $salary->getDriversSelect();
    $drivers = $salary->getFirstItemDrivers($drivers, $oneSelect); //сохр-й в бд водитель - первым при выводе в списке


    include("views/salary/otherFinesFormEdit.php");

  }
}
///// !!!!!!! ------ В РАБОТЕ -----------------------------////




  // редактирование фактически оплаченных суточных
public function edit_paid_prr($id){
    if(!empty($_POST) && $id > 0){
    $salary = new Salary();

    //высчитываем сколько массивов должно быть (водители с суточными)
    $removed = array_pop($_POST); //убираем button из вх-го массива на всякий случай
    $date = $id; //чтобы дальше в for id и month_and_years не пересекались
    $value = array_chunk($_POST, 3, true); //делим POST на столько элементов, сколько и водителей в этом месяце

    for ($i=0; $i < count($value); $i++) {
          $massive[$i] = array(
            "id_prr_paid" => $value[$i]['id_prr_paid_'.$i],
            "month_and_years" => $date.'-01',
            "date_prr_paid" => $value[$i]['date_prr_paid_'.$i],
            "sum_prr_paid" => $value[$i]['sum_prr_paid_'.$i]
          );

          $id_prr_paid = $massive[$i]['id_prr_paid'];

          //trim() - обрезать пробелы по краям строки
          $values = array(
            $month_and_years = trim($massive[$i]['month_and_years']),
            $date_prr_paid = trim($massive[$i]['date_prr_paid']),
            $sum_prr_paid = trim((int)$massive[$i]['sum_prr_paid'])
          );

          $salary->setEditPrrPaid($id_prr_paid, $values);
    }

    header("Location: /salary/view/".$id);
  } else {
       $salary = new Salary();
       $numberOfDaysInMonth = $salary->numberOfDaysInMonth($id);
       $oneMonth = $salary->getOneMonth($id, $numberOfDaysInMonth); //за один месяц зп
       $prr_paid = $salary->getPrrPaid($id);

       $oneMonth = $salary->getMonthWithPaidPrr($prr_paid, $oneMonth);

       $monthAndYears = date('M Y ', strtotime($prr_paid['0']['month_and_years']));

      include("views/salary/prrPaidFormEdit.php");
    }
}



  // - в форме редактирования первым ставить тот статус, который сейчас актуален, т.е.
  // если было не оплачено, то в выпадающем списке первым должно стоять "не оплачено" и т.д.
public function edit_other_works($id) {
  if(!empty($_POST)&& $id > 0) {
    $driversOtherWorks = new Salary();

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $sum = $_POST['sum'],
      $date_of_work = $_POST['date_of_work'],
      $id_status = $_POST['status'],
      $note = $_POST['note']
    );

    !!    $driversOtherWorks->getEdit($id, $values);
    header("Location: /salary");
    } else {
    $driversOtherWorks = new Salary();
    $oneSelect = $driversOtherWorks->getOneSelect($id);
    // var_export($oneSelect);
    $drivers = $driversOtherWorks->getDriversSelect();
    $status = $driversOtherWorks->getStatusSelect();

    //Поставить при выводе сохраненные в бд
    //клиента, машину и водителя в списке формы первыми:
    $drivers = $driversOtherWorks->getFirstItemDrivers($drivers, $oneSelect);
    $status = $driversOtherWorks->getFirsItemStatus($status, $oneSelect);
    // var_export($status);

    include ("views/driversOtherWorks/driversOtherWorksFormEdit.php");

  }
}



}
