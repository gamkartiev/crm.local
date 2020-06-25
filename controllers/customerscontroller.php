<?php

/* ------------------- */
class CustomersController extends Controller
{
  public function view($id) {
    $customers = new Customers();
    $allCustomers = $customers->getAllString();
    $oneCustomersName = $customers->getOneString($id);

    include ("views/customers/customers.php");
  }
}
