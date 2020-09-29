<?php

/* ------------------- */
class CustomersController extends Controller
{

//-----------выведение всех строк-----------------//
  public function view($id) {
    $customers = new Customers();

    $allCustomers = $customers->getAllSelect();
    $oneCustomersName = $customers->getOneSelect($id);

    include ("views/customers/customers.php");
  }


//-----------создание-----------------//
  public function add() {
      if (!empty($_POST)) {
        $customers = new Customers();

        $values = array(
            $name = $_POST['name'],
            $short_name = $_POST['short_name'],
            $INN = $_POST['INN'],
            $OGRN = $_POST['OGRN'],
            $actual_address = $_POST['actual_address'],
            $legal_address = $_POST['legal_address'],
            $mailing_address = $_POST['mailing_address'],
            $KPP = $_POST['KPP'],
            $OKPO_code = $_POST['OKPO_code'],
            $OKFC_code = $_POST['OKFC_code'],
            $OKOPF_code = $_POST['OKOPF_code'],
            $OKVED_main_code = $_POST['OKVED_main_code'],
            $CEO = $_POST['CEO'],
            $bank = $_POST['bank'],
            $payment_account = $_POST['payment_account'],
            $correspondent_account = $_POST['correspondent_account'],
            $BIK = $_POST['BIK'],
            $note = $_POST['note']
          );

        $customers->getInsert($values);

        header("Location: /customers");
        exit();
      } else {
          include("views/customers/customersForm.php");
      }
    }

//-----------редактирование-----------------//
  public function edit($id) {
    if (!empty($_POST)&& $id > 0) {
      $customers = new Customers();

      $values = array(
          $name = $_POST['name'],
          $short_name = $_POST['short_name'],
          $INN = $_POST['INN'],
          $OGRN = $_POST['OGRN'],
          $actual_address = $_POST['actual_address'],
          $legal_address = $_POST['legal_address'],
          $mailing_address = $_POST['mailing_address'],
          $KPP = $_POST['KPP'],
          $OKPO_code = $_POST['OKPO_code'],
          $OKFC_code = $_POST['OKFC_code'],
          $OKOPF_code = $_POST['OKOPF_code'],
          $OKVED_main_code = $_POST['OKVED_main_code'],
          $CEO = $_POST['CEO'],
          $bank = $_POST['bank'],
          $payment_account = $_POST['payment_account'],
          $correspondent_account = $_POST['correspondent_account'],
          $BIK = $_POST['BIK'],
          $note = $_POST['note']
        );

      $customers->getEdit($id, $values);

      header("Location: /customers/view/".$id);
    } else {
      // var_export($id);
        $customers = new Customers();
        $oneCustomersName = $customers->getOneSelect($id);

        include("views/customers/customersFormEdit.php");
    }
  }

//-----------удаление-----------------//
public function delete($id) {
  if ($id > 0) {
    $customers = new Customers();
    $customers->deleteCustomers($id);

    header("Location: /Customers");
  } else {
    print_r("Не выбрано, что нужно удалить");
    time_nanosleep(2,0); //по идее должен пару сек паказывать print_r - не работает
    header("Location: /Customers");
  }
}
}
