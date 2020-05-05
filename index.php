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



//если задан переход по странице(selectedPage), иначе selectedPage - пустое
$selectedPage = $_GET['selectedPage'] ?? $selectedPage="";
$id = $_GET['id'] ?? $id = 1; //убрать тут единицу и поставить функцию вывода последнего добавленного

//	Укоротить этот блок (снизу) - (?: или ||)
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
// этот блок (сверху)


$action = $_GET['action'] ?? $action = "";

if ($action == 'addNewFlight') {
  if (!empty(POST)) {
    createFlight($link, $_POST['']);
    header("Location: index.php");
  }
  include("/views/flightForm.php");
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
    include("/views/flights_all.php");
}




?>
