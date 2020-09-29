<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/customers/edit/<?=$id?>" method="post">

  <label for="name"> Название компании: </label>
  * <input type="text" name="name" value="<?=$oneCustomersName['0']['name']?>" id="name" required> <br />

  <label for="short_name"> Короткое название: </label>
  <input type="text" name="short_name" value="<?=$oneCustomersName['0']['short_name']?>" id="short_name"> <br />

  <label for="INN"> ИНН: </label>
  <input type="text" name="INN" value="<?=$oneCustomersName['0']['INN']?>" id="INN"> <br />

  <label for="OGRN"> ОГРН: </label>
  <input type="text" name="OGRN" value="<?=$oneCustomersName['0']['OGRN']?>" id="OGRN"> <br />

  <label for="actual_address"> Фактический адрес: </label>
  <input type="text" name="actual_address" value="<?=$oneCustomersName['0']['actual_address']?>" id="actual_address"> <br />

  <label for="legal_address"> Юридический адрес: </label>
  <input type="text" name="legal_address" value="<?=$oneCustomersName['0']['legal_address']?>" id="legal_address"> <br />

  <label for="mailing_address"> Почтовый адрес: </label>
  <input type="text" name="mailing_address" value="<?=$oneCustomersName['0']['mailing_address']?>" id="mailing_address"> <br />

  <label for="KPP"> КПП: </label>
  <input type="text" name="KPP" value="<?=$oneCustomersName['0']['KPP']?>" id="KPP"> <br />

  <label for="OKPO_code"> ОКПО: </label>
  <input type="text" name="OKPO_code" value="<?=$oneCustomersName['0']['OKPO_code']?>" id="OKPO_code"> <br />

  <label for="OKFC_code"> ОКФС: </label>
  <input type="text" name="OKFC_code" value="<?=$oneCustomersName['0']['OKFC_code']?>" id="OKFC_code">

  <label for="OKOPF_code"> ОКОПФ: </label>
  <input type="text" name="OKOPF_code" value="<?=$oneCustomersName['0']['OKOPF_code']?>" id="OKOPF_code"> <br />

  <label for="OKVED_main_code"> Основной код ОКВЕД: </label>
  <input type="text" name="OKVED_main_code" value="<?=$oneCustomersName['0']['OKVED_main_code']?>" id="OKVED_main_code"> <br />

  <label for="CEO"> Генеральный директор: </label>
  <input type="text" name="CEO" value="<?=$oneCustomersName['0']['CEO']?>" id="CEO"> <br />

  <label for="bank"> Банк: </label>
  <input type="text" name="bank" value="<?=$oneCustomersName['0']['bank']?>" id="bank"> <br />

  <label for="payment_account"> Рассчетный счет: </label>
  <input type="text" name="payment_account" value="<?=$oneCustomersName['0']['payment_account']?>" id="payment_account"> <br />

  <label for="correspondent_account"> Корреспондентский счет: </label>
  <input type="text" name="correspondent_account" value="<?=$oneCustomersName['0']['correspondent_account']?>" id="correspondent_account"> <br />

  <label for="BIK"> БИК: </label>
  <input type="text" name="BIK" value="<?=$oneCustomersName['0']['BIK']?>" id="BIK"> <br />

  <label for="note"> Примечание: </label>
  <input type="text" name="note" value="<?=$oneCustomersName['0']['note']?>" id="note"> <br />

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
