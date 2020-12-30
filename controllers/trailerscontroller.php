<?php

/* ------------------- */
class TrailersController extends Controller
{
  public function view($id) {
    $trailers = new Trailers();

    $allTrailersName = $trailers->getAllSelect();
    $oneTrailerName = $trailers->getOneSelect($id);

    include ("views/trailers/trailers.php");
  }



  //-----------создание-----------------//
  public function add() {
      if (!empty($_POST)) {
        $trailers = new Trailers();

        $values = array(
          $state_sign_trailer = $_POST['state_sign_trailer'],
          $PTS_trailer = $_POST['PTS_trailer'],
          $STS_trailer = $_POST['STS_trailer'],
          $VIN_trailer = $_POST['VIN_trailer'],
        );

        $trailers->getInsert($values);

        header("Location: /trailers");
        // exit();
      } else {
          include("views/trailers/trailersForm.php");
      }
    }



  //-----------редактирование-----------------//
  public function edit($id) {
    if(!empty($_POST)&& $id > 0) {

      $values = array(
        $state_sign_trailer = $_POST['state_sign_trailer'],
        $PTS_trailer = $_POST['PTS_trailer'],
        $STS_trailer = $_POST['STS_trailer'],
        $VIN_trailer = $_POST['VIN_trailer'],
      );

      $trailers = new Trailers();
      $trailers->getEdit($id, $values);

      header("location: /trailers/view/".$id);
    } else {
      $trailers = new Trailers();
      $oneTrailerName = $trailers->getOneSelect($id);

      include("views/trailers/trailersFormEdit.php");
    }
  }



  //-----------удаление-----------------//
  public function delete($id) {
    if ($id > 0){
      $trailers = new Trailers();
      $trailers->deleteTrailer($id);

      header("Location: /trailers");
    } else {
      header("Location: /trailers");
    }
  }

}
