<?php

/*--------------*/
class PrrController extends controller
{

//-------выведение всех строк------//
public function view($id) {
  $prr = new Prr();
  $allPrrMonth = $prr->getAllMonthSelect(); //месяцы в виде чисел
  $allPrrMonth = $prr->getStringFormatDate($allPrrMonth); //месяцы в виде строки

var_export($_POST['array']);
  $allEvents = $prr->getAllEventsSelect();


  //вызвать последний месяц, если id не назначено
  if(empty($id)){
    $id = $prr->getLastMonth();
  }
;


  //количество дней в месяце
  $numberOfDaysInMonth = $prr->numberOfDaysInMonth($id);
  $driversTest = $prr->getOneMonth($id, $numberOfDaysInMonth); //вызвать один месяц


# берем последний месяц и делаем запрос в бд по этому
# месяцу на ПРР (есть отдельная таблица в БД).
# если там есть месяц, то выдаем в value в прр view input
# те данные, что мы получили.
#
// или сделать другой вариант
# сделать таблицы по месяцам в бд
# и сделать отдельное добавление и отдельное редактирование
# в view ПРР. При заходе с нуля выдаются по последнему месяцу
# уже затем можно будет добавлять остальные месяцы
#

  $drivers = $prr->getDriversSelect();

  include("views/prr/prr.php");



}


public function add() {
  if(!empty($_POST)){

    $values = array(
      $id_drivers = $_POST['id_drivers'],
      $event = $_POST['event'],
      $start = $_POST['start'],
      $the_end = $_POST['the_end']
    );

  $prr = new Prr();
  $prr->getInsert($values);
  header("Location: /prr");
  }
}


public function delete($id){
  if($id>0){
    $prr = new Prr();
    $prr->deleteEvent($id);

    header("Location: /prr/view");
  } else {
    header("Location: /prr/view");
  }
}



}
