<?php
class ParametersController extends Controller
{

//---------------------//
public function view(){
  $parameters = new Parameters();

  $dailyAllowance = $parameters->getActualDailyAllowance();
  $premium = $parameters->getPremium();
  $parameters = array_merge($dailyAllowance[0], $premium[0]);

// var_export($parameters);
  include("views/parameters/parameters.php");
}


//---------------------//
public function add(){
  if(!empty($_POST)){
  $parameters = new Parameters();

    $values = array(
      $total_premium = $_POST['total_premium'],
      $premium = $_POST['premium'],
      $start_premium = $_POST['start_premium']
    );
    $parameters->getInsertPremium($values);

    $values = array(
      $daily_allowance = $_POST['daily_allowance'],
      $start_daily_allowance = $_POST['start_daily_allowance']
    );
    $parameters->getInsertDailyAllowance($values);

  header("Location: /parameters");
  } else {
    include("views/parameters/parametersForm.php");
  }
}



// Тут можно добавить функцию, которая сравнивает последнюю запись премии или
// суточных в бд и если все данные совпадают - не меняет эти данные. Это нужно
// сделать, чтобы не перегружать бд. Не срочно 
// --Эта функция не исопльзуется ---//
public function edit($id){
  if(!empty($_POST)) {
    $parameters = new Parameters();

    $id = $_POST['premium_id'];
    $values = array(
      $total_premium = $_POST['total_premium'],
      $premium = $_POST['premium'],
      $start_premium = $_POST['start_premium']
    );
    $parameters->getInsertPremium($values);
    // добляем новую запись в бд вместо изменении существующей для того,
    // чтобы сохранялась история изменения данных. Это для старых данных по зп
    // $parameters->getEditPremium($id, $values);


    $id = $_POST['daily_allowance_id'];
    $values = array(
      $daily_allowance = $_POST['daily_allowance'],
      $start_daily_allowance = $_POST['start_daily_allowance']
    );
    $parameters->getInsertDailyAllowance($values);
    // $parameters->getEditDailyAllowance($id, $values);

    header("Location: /parameters");
  } else {
    $parameters = new Parameters();
    $dailyAllowance = $parameters->getActualDailyAllowance($id);
    $premium = $parameters->getPremium($id);

    include("views/parameters/parametersFormEdit.php");
  }
}


//---Эта функция не используется---//
public function delete($id){
  if($id > 0) {
    $parameters = new Parameters();
    $parameters->deleteDailyAllowance($id);

    header("Location: /parameters");
  }else {
    header("Location: /parameters");
  }
}



}
