<?php
/* ------------------- */
class FlightsController extends Controller
{
    public function view($id) {
      if ($id > 0) {
        $flights = new Flights();
        $oneFlights = $flights->getOneSelect($id);

        require("views/flights/flights_one.php");
      } else {
        $flights = new Flights();
        $allFlights = $flights->getAllSelect();

        require("views/flights/flights_all.php");
      }
  }

    public function add() {
        if (!empty($_POST)) {
          $flights = new Flights();

          $values = array(
                $place_1 = $_POST['place_1'],
                $place_2 = $_POST['place_2'],
                $date_1 = $_POST['date_1'],
                $date_2 = $_POST['date_2'],
                $freight = $_POST['freight'],
                $weight = $_POST['weight'],
                $volume = $_POST['volume'],
                $cost = $_POST['cost'],
                $form_of_payment = $_POST['form_of_payment'],
                $car = $_POST['car'],
                $id_customers = $_POST['customers'],
                $proxy = $_POST['proxy'],
                $request = $_POST['request'],
                $note = $_POST['note']

          );
          $flights->getInsert($values);

          header("Location: /");
          exit();
        } else {
            $flights = new Flights();
            $customers = $flights->getCustomersSelect();
            $cars = $flights->getCarsSelect();

            include("views/flights/flightsForm.php");
        }
      }


//-----------редактирование-----------------//
    public function edit($id) {
      if (!empty($_POST) && $id > 0){
        $flights = new Flights();

        $values = array(
            $place_1 = $_POST['place_1'],
            $place_2 = $_POST['place_2'],
            $date_1 = $_POST['date_1'],
            $date_2 = $_POST['date_2'],
            $freight = $_POST['freight'],
            $weight = $_POST['weight'],
            $volume = $_POST['volume'],
            $cost = $_POST['cost'],
            $form_of_payment = $_POST['form_of_payment'],
            $car = $_POST['car'],
            $customers = $_POST['customers'],
            $proxy = $_POST['proxy'],
            $request = $_POST['request'],
            $note = $_POST['note']
        );

        $flights->getEdit($id, $values);

        header("Location: /flights/view/".$id);
        exit();
      } else {

        $flights = new Flights();

        $customers = $flights->getCustomersSelect();
        $cars = $flights->getCarsSelect();
        $oneFlights = $flights->getOneSelect($id);

        //Поставить при выводе сохраненные в бд параметры:
        $customers = $flights->getFirstItemCustomers($customers, $oneFlights);
        $cars = $flights->getFirstItemCars($cars, $oneFlights);


        include("views/flights/flightsFormEdit.php");
      }
    }



    //-----------удаление-----------------//
    public function delete($id) {
      if($id > 0) {
        $flights = new Flights();
        $flights->deleteFlight($id);

        header("location: /flights/view");
        exit();
      } else {
        header("Location: /flights/view");
        exit();
      }
    }
}
