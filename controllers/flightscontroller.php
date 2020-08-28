<?php
/* ------------------- */
class FlightsController extends Controller
{
    public function view() {
      $flights = new Flights();
      $allFlights = $flights->sqlGetAllString();

      var_export($allFlights);

      // for($i=0; $i<15; $i++){
      //   echo "/ ".key($allFlights);
      //   next($allFlights);
      // }

      require("views/flights/flights_all.php");
  }

    public function add() {
        if (!empty($_POST)) {
          $flights = new Flights();

          $place_1 = $_POST['place_1'];
          $place_2 = $_POST['place_2'];
          $date_1 = $_POST['date_1'];
          $date_2 = $_POST['date_2'];
          $freight = $_POST['freight'];
          $weight = $_POST['weight'];
          $volume = $_POST['volume'];
          $cost = $_POST['cost'];
          $form_of_payment = $_POST['form_of_payment'];
          $proxy = $_POST['proxy'];
          $request = $_POST['request'];
          $note = $_POST['note'];

          $flights->createString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost, $form_of_payment, $proxy, $request, $note);

          header("Location: /");
          exit();
        } else {
            include("views/flights/flightsForm.php");
        }
      }

  public function edit() {}
}
