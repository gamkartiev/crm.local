<?php

/* ------------------- */
class CustomersController extends Controller
{
  public function view() {
    $customers = new Customers();
    $allCustomers = $customers->getAllString();
    $oneCustomersName = $customers->getOneString($id);

    include ("views/customers/customers.php");
  }
}
