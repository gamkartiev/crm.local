<?php
/* ------------------- */
class FlightsController extends Controller
{
    public function view() {
      $flights = new Flights();
      $allFlights = $flights->getAllSelect();

      require("views/flights/flights_all.php");
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
                $proxy = $_POST['proxy'],
                $request = $_POST['request'],
                $note = $_POST['note'],
                $id_cars = $_POST['car'],
                $id_customers = $_POST['customers']
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

    public function post($id){
      $flights = new Flights();
      $oneFlights = $flights->getOneSelect($id);

      require("views/flights/flights_one.php");
    }
    public function edit() {}
}
