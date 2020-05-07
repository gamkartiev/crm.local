<?php
include ("db.php");
include ("models/models.php");

$link = db_connect();

$cars = new cars();
$allCarsName = $cars->getAllString();

$drivers = new drivers();
$allDriversName = $drivers->getAllString();

$customers = new customers();
$allCustomers = $customers->getAllString();

$flights = new flights();
$allFlights = $flights->getAllString();


// ------------------------------- //
$action = $_GET['action'] ?? "";

if ($action == 'addNewFlight') {
  //не работает добавление на mysqli!!!
  if (!empty($_POST)) {
  $flights->createString($_POST['place_1']);
  header("Location: index.php");
  }
  include("views/flightForm.php");
  exit();

} elseif ($action == "edit") {
    if(!isset($_GET['id'])) {
      header("Location: index.php");
    }
    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id > 0) {
      editflight($link, $id, $_POST['']);
      header("Location: index.php");
    }
    $flight = getFlight($link, $id);  //Зачем этот пункт?
    include("/views/flightForm.php");

} elseif ($action == "delete") {
    $id = $_GET['id'];
    deleteFlight($link, $id);
    header("Location: index.php");

} else {
    include("views/flights_all.php");
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

?>
