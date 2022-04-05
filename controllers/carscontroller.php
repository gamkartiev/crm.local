<?php
/* ------------------- */
class CarsController extends Controller
{
  public function view($id) {
    $cars = new Cars();

    $allCarsName = $cars->getAllSelect();
    $oneCarName = $cars->getOneSelect($id);
    $drivers_work_shedule = $cars->getDriversWorkShedule($id);
// var_export($drivers_work_shedule);
    if(!empty($drivers_work_shedule)){
      $oneCarName[0] = array_merge($oneCarName[0], $drivers_work_shedule[0]);
      } elseif(!empty($oneCarName)){
       $oneCarName[0]['driver']='отсутствует';
       $oneCarName[0]['start']='';
    }
// var_export($drivers_work_shedule);
// var_export($oneCarName);

    include ("views/cars/cars.php");
  }

  //-----------создание-----------------//
  public function add() {
      if (!empty($_POST)) {
        $cars = new Cars();

        $values = array(
          $brand = $_POST['brand'],
          $state_sign_cars = $_POST['state_sign_cars'],
          $PTS_cars = $_POST['PTS_cars'],
          $STS_cars = $_POST['STS_cars'],
          $VIN_cars = $_POST['VIN_cars'],
        );

        $cars->getInsert($values);
        header("Location: /cars");
      } else {
          include("views/cars/carsForm.php");
      }
    }



  //-----------редактирование-----------------//
  public function edit($id) {
    if(!empty($_POST['state_sign_cars'])&& $id > 0) {

      $values = array(
        $brand = $_POST['brand'],
        $state_sign_cars = $_POST['state_sign_cars'],
        $PTS_cars = $_POST['PTS_cars'],
        $STS_cars = $_POST['STS_cars'],
        $VIN_cars = $_POST['VIN_cars']
      );

      $cars = new Cars();
      $cars->getEdit($id, $values);
      $drivers_work_shedule = $cars->getDriversWorkShedule($id);

      //вставка сменного водителя
      //убрать этот отрывок Франкейнштена или хотя бы перекинуть в модели
      $the_end = $_POST['the_end'];

      if(empty($_POST['the_end'])){
        $the_end = '0000-00-00';
      }

      if($_POST['start']=='' OR $_POST['start']=='0000-00-00'){
        $_POST['start'] = date("Y-m-d");
      }

      // если id водителя 2, то это строчка с полем "отсутствует"
      if($_POST['id_drivers']==='2'){
        $_POST['start'] = '0000-00-00';
      }


      $values = array(
        $id_cars = $id,
        $id_drivers = $_POST['id_drivers'],
        $start = $_POST['start'],
        $the_end
      );

// var_export($_POST['id_drivers_work_shedule']);
//если при редакт-и водителя водитель новый, то привязать нового водителя к машине
//сюда же можно добавить изменить срок работы старого привязанного водителя (the_end)
if($_POST['id_drivers'] != $drivers_work_shedule[0]['id_drivers']){
  // var_export($_POST['id_drivers']);
  // var_export($drivers_work_shedule[0]['id_drivers']);
      $the_end = date("Y-m-d");
      $id = $_POST['id_drivers_work_shedule'];
      $cars->editTheEnd($id, $the_end);

      $cars->getLinkANewDriver($values);
}



############------псевдокод-----------#############
//сюда вставить функцию изменения the_end старого водителя
// if($_POST['id_drivers'] != $drivers_work_shedule[0]['id_drivers'] ){
  // var_export($drivers_work_shedule);
  // var_export($_POST['id_drivers']);
      // $the_end = date("Y-m-d");
  // var_export($the_end);
      // $cars->editTheEnd($id, $the_end);
//}
############------конец псевдокода-----------#############


      header("location: /cars/view/".$id);
    } else {
      $cars = new Cars();
      $oneCarName = $cars->getOneSelect($id);
      $drivers = $cars->getDriversSelect();
      $drivers_work_shedule = $cars->getDriversWorkShedule($id);

// var_export($drivers_work_shedule);


      //добавление пустой строки, если водителя мы не будем добавлять на эту ТС
      if(empty($drivers_work_shedule)){
        $a[0]['driver'] = " ";
        $drivers = array_merge($a, $drivers);
      }

      if(!empty($drivers_work_shedule)){
        $oneCarName[0] = array_merge($oneCarName[0], $drivers_work_shedule[0]);
        $drivers = $cars->getFirstItemDrivers($drivers, $oneCarName);
      }
// var_export($oneCarName);

    //1. обозначить водителя "действующим", если the_end равно нулям,
    //проставить дату окончания вахты при выводе.


      include("views/cars/carsFormEdit.php");
    }
  }



  //-----------удаление-----------------//
  public function delete($id) {
    if ($id > 0){
      $cars = new Cars();
      $cars->deleteCar($id);

      header("Location: /cars");
      exit();
    } else {
      header("Location: /cars");
      exit();
    }
  }

}
