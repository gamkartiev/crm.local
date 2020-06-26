<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/customers/add" method="post">

  <label for="name"> Название компании: </label>
  <input type="text" name="name" placeholder="" id="name"> <br />

  <label for="short_name"> Короткое название: </label>
  <input type="text" name="short_name" value="" id="short_name"> <br />

  <label for="INN"> ИНН: </label>
  <input type="number" name="INN" value="" id="INN"> <br />

  <label for="OGRN"> ОГРН: </label>
  <input type="number" name="OGRN" value="" id="OGRN"> <br />

  <label for="actual_address"> Фактический адрес: </label>
  <input type="text" name="actual_address" value="" id="actual_address"> <br />

  <label for="legal_address"> Юридический адрес: </label>
  <input type="text" name="legal_address" value="" id="legal_address"> <br />

  <label for="mailing_address"> Почтовый адрес: </label>
  <input type="text" name="mailing_address" value="" id="mailing_address"> <br />

  <label for="KPP"> КПП: </label>
  <input type="text" name="KPP" value="" id="KPP"> <br />

  <label for="OKPO_code"> ОКПО: </label>
  <input type="text" name="OKPO_code" value="с НДС" id="OKPO_code"> <br />

  <label for="OKFC_code"> ОКФС: </label>
  <input type="text" name="OKFC_code" value="" id="OKFC_code">

  <label for="OKOPF_code"> ОКОПФ: </label>
  <input type="text" name="OKOPF_code" value="" id="OKOPF_code"> <br />

  <label for="OKVED_main_code"> Основной код ОКВЕД: </label>
  <input type="text" name="OKVED_main_code" value="" id="OKVED_main_code"> <br />

  <label for="CEO"> Генеральный директор: </label>
  <input type="text" name="CEO" value="" id="CEO"> <br />

  <label for="bank"> Банк: </label>
  <input type="text" name="bank" value="" id="bank"> <br />

  <label for="payment_account"> Рассчетный счет: </label>
  <input type="number" name="payment_account" value="" id="payment_account"> <br />

  <label for="correspondent_account"> Корреспондентский счет: </label>
  <input type="number" name="correspondent_account" value="" id="correspondent_account"> <br />

  <label for="BIK"> БИК: </label>
  <input type="number" name="BIK" value="" id="BIK"> <br />

  <label for="note"> Примечание: </label>
  <input type="text" name="note" value="" id="note"> <br />
  
  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
