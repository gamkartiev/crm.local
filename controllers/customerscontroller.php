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

  public function add() {
      if (!empty($_POST)) {
        $customers = new Customers();

        $name = $_POST['name'];
        $short_name = $_POST['short_name'];
        $INN = $_POST['INN'];
        $OGRN = $_POST['OGRN'];

        $actual_address = $_POST['actual_address'];
        $legal_address = $_POST['legal_address'];
        $mailing_address = $_POST['mailing_address'];

        $KPP = $_POST['KPP'];
        $OKPO_code = $_POST['OKPO_code'];
        $OKFC_code = $_POST['OKFC_code'];
        $OKOPF_code = $_POST['OKOPF_code'];
        $OKVED_main_code = $_POST['OKVED_main_code'];

        $CEO = $_POST['CEO'];

        $bank = $_POST['bank'];
        $payment_account = $_POST['payment_account'];
        $correspondent_account = $_POST['correspondent_account'];
        $BIK = $_POST['BIK'];

        $note = $_POST['note'];

        $customers->createString(); //сюда добавить параметры

        header("Location: /");
        exit();
      } else {
          include("views/customers/customersForm.php");
      }
    }

public function edit() {}
}
