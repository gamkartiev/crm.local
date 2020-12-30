<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/customers/add" method="post">

  <label for="name"> Название компании: </label>
  * <input type="text" name="name" placeholder="" id="name" required autocomplete="off"> <br />

  <label for="short_name"> Короткое название: </label>
  <input type="text" name="short_name" placeholder="" id="short_name" autocomplete="off"> <br />

  <label for="INN"> ИНН: </label>
  <input type="text" name="INN" placeholder="" id="INN" autocomplete="off"> <br />

  <label for="OGRN"> ОГРН: </label>
  <input type="text" name="OGRN" placeholder="" id="OGRN" autocomplete="off"> <br />

  <label for="actual_address"> Фактический адрес: </label>
  <input type="text" name="actual_address" placeholder="" id="actual_address" autocomplete="off"> <br />

  <label for="legal_address"> Юридический адрес: </label>
  <input type="text" name="legal_address" placeholder="" id="legal_address" autocomplete="off"> <br />

  <label for="mailing_address"> Почтовый адрес: </label>
  <input type="text" name="mailing_address" placeholder="" id="mailing_address" autocomplete="off"> <br />

  <label for="KPP"> КПП: </label>
  <input type="text" name="KPP" placeholder="" id="KPP" autocomplete="off"> <br />

  <label for="OKPO_code"> ОКПО: </label>
  <input type="text" name="OKPO_code" placeholder="" id="OKPO_code" autocomplete="off"> <br />

  <label for="OKFC_code"> ОКФС: </label>
  <input type="text" name="OKFC_code" placeholder="" id="OKFC_code" autocomplete="off">

  <label for="OKOPF_code"> ОКОПФ: </label>
  <input type="text" name="OKOPF_code" placeholder="" id="OKOPF_code" autocomplete="off"> <br />

  <label for="OKVED_main_code"> Основной код ОКВЕД: </label>
  <input type="text" name="OKVED_main_code" placeholder="" id="OKVED_main_code" autocomplete="off"> <br />

  <label for="CEO"> Генеральный директор: </label>
  <input type="text" name="CEO" placeholder="" id="CEO" autocomplete="off"> <br />

  <label for="bank"> Банк: </label>
  <input type="text" name="bank" placeholder="" id="bank" autocomplete="off"> <br />

  <label for="payment_account"> Рассчетный счет: </label>
  <input type="text" name="payment_account" placeholder="" id="payment_account" autocomplete="off"> <br />

  <label for="correspondent_account"> Корреспондентский счет: </label>
  <input type="text" name="correspondent_account" placeholder="" id="correspondent_account" autocomplete="off"> <br />

  <label for="BIK"> БИК: </label>
  <input type="text" name="BIK" placeholder="" id="BIK" autocomplete="off"> <br />

  <label for="note"> Примечание: </label>
  <input type="text" name="note" placeholder="" id="note" autocomplete="off"> <br />

  <button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
