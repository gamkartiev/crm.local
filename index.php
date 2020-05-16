<?php
include ("db.php");
include ("models/models.php");

$cars = new Cars();
$allCarsName = $cars->getAllString();

$drivers = new Drivers();
$allDriversName = $drivers->getAllString();

$customers = new Customers();
$allCustomers = $customers->getAllString();

$flights = new Flights();
$allFlights = $flights->getAllString();


// ------------------------------- //
$action = $_GET['action'] ?? "";

if ($action == 'addNewFlight') {
  if (!empty($_POST)) {
    $place_1 = $_POST['place_1'];
    $place_2 = $_POST['place_2'];
    $date_1 = $_POST['date_1'];
    $date_2 = $_POST['date_2'];
    $freight = $_POST['freight'];
    $weight = $_POST['weight'];
    $volume = $_POST['volume'];
    $cost = $_POST['cost'];
  // var_dump($action );
      $flights->createString($place_1, $place_2, $date_1, $date_2, $freight, $weight, $volume, $cost);
      header("Location: index.php");

  } else {
      include("views/flightForm.php");
      exit();
  }

} elseif ($action == "edit") {
    if(!isset($_GET['id'])) {
      header("Location: index.php");
    }
    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id > 0) {
      editflight($id, $_POST['']);
      header("Location: index.php");
    }
    $flight = getFlight($id);
    include("/views/flightForm.php");

} elseif ($action == "delete") {
    $id = $_GET['id'];
    deleteFlight($link, $id);
    header("Location: index.php");
}

// ------------------------------------ //


//если задан переход по странице(selectedPage), иначе selectedPage - пустое
$selectedPage = $_GET['selectedPage'] ?? "";
$id = $_GET['id'] ?? 1; //убрать тут единицу и поставить функцию вывода последнего добавленного

//	------------------------ //
if ($selectedPage == 'actual') {
    include ("views/actual.php");

} elseif ($selectedPage == 'drivers') {
    $oneDriversName = $drivers->getOneString($id);
    include ("views/drivers.php");

} elseif ($selectedPage == 'cars') {
    $oneCarsName = $cars->getOneString($id);
    include ("views/cars.php");

} elseif ($selectedPage == 'customers') {
    $oneCustomersName = $customers->getOneString($id);
    include ("views/customers.php");

} elseif ($selectedPage == 'financePlan') {
    include ('views/404.php');
    exit();

} else {
    include ("views/flights_all.php");
}
// ------------------------------- //



// $date_1 = $_POST['date_1'];
// $date_2 = $_POST['date_2'];
// $place_1 = $_POST['place_1'];
// $place_2 = $_POST['place_2'];
// $freight = $_POST['freight'];
// $weight = $_POST['weight'];
// $cost = $_POST['cost'];
// $formOfPayment = $_POST['formOfPayment'];
// $volume = $_POST['volume'];
// $proxy = $_POST['proxy'];
// $request = $_POST['request'];
// $note = $_POST['note'];
// $flights->createString($date_1, $date_2, $place_1, $place_2, $freight,
//         $weight, $cost, $formOfPayment, $volume, $proxy, $request, $note);
// header("Location: index.php");
