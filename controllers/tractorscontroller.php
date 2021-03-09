<?php
/* ------------------- */
class TractorsController extends Controller
{
  public function view($id) {
    $tractors = new Tractors();

    $allTractorsName = $tractors->getAllSelect();
    $oneTractorName = $tractors->getOneSelect($id);

    include ("views/tractors/tractors.php");
  }

  //-----------создание-----------------//
  public function add() {
      if (!empty($_POST)) {
        $tractors = new Tractors();
        // $date_start =

        $values = array(
          $brand = $_POST['brand'],
          $state_sign_tractor = $_POST['state_sign_tractor'],
          $PTS_tractor = $_POST['PTS_tractor'],
          $STS_tractor = $_POST['STS_tractor'],
          $VIN_tractor = $_POST['VIN_tractor'],
        );

        $tractors->getInsert($values);

        header("Location: /tractors");
        exit();
      } else {
          include("views/tractors/tractorsForm.php");
      }
    }


  //-----------редактирование-----------------//
  public function edit($id) {
    if(!empty($_POST)&& $id > 0) {

      $values = array(
        $state_sign_tractor = $_POST['state_sign_tractor'],
        $PTS_tractor = $_POST['PTS_tractor'],
        $STS_tractor = $_POST['STS_tractor'],
        $VIN_tractor = $_POST['VIN_tractor'],
      );

      $tractors = new Tractors();
      $tractors->getEdit($id, $values);

      header("location: /tractors/view/".$id);
    } else {
      $tractors = new Tractors();
      $oneTractorName = $tractors->getOneSelect($id);

      include("views/tractors/tractorsFormEdit.php");
    }
  }

  //-----------удаление-----------------//
  public function delete($id) {
    if ($id > 0){
      $tractors = new Tractors();
      $tractors->deleteTractor($id);

      header("Location: /tractors");
    } else {
      header("Location: /tractors");
    }
  }

}
