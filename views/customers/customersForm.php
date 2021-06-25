<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
  <meta charset="utf-8">
  <title> Добавление нового рейса </title>
</head>


<body>

<form action="/customers/add" method="post">
  <label> Название компании:
   *<input type="text" name="name" required autocomplete="off"> <br />
    </label>

  <label> Короткое название:
   <input type="text" name="short_name" autocomplete="off"> <br />
   </label>

  <label> ИНН:
   <input type="text" name="INN" autocomplete="off" maxlength="12"> <br />
   </label>

  <label> ОГРН:
   <input type="text" name="OGRN" autocomplete="off" maxlength="13"> <br />
   </label>

  <label> Фактический адрес:
   <input type="text" name="actual_address" autocomplete="off"> <br />
   </label>

  <label> Юридический адрес:
   <input type="text" name="legal_address" autocomplete="off"> <br />
   </label>

  <label> Почтовый адрес:
   <input type="text" name="mailing_address" autocomplete="off"> <br />
   </label>

  <label> КПП:
   <input type="text" name="KPP" autocomplete="off"> <br />
   </label>

  <label> ОКПО:
   <input type="text" name="OKPO_code" autocomplete="off"> <br />
   </label>

  <label> ОКФС:
   <input type="text" name="OKFC_code" autocomplete="off">
   </label>

  <label> ОКОПФ:
   <input type="text" name="OKOPF_code" autocomplete="off"> <br />
   </label>

  <label> Основной код ОКВЕД:
   <input type="text" name="OKVED_main_code" autocomplete="off"> <br />
   </label>

  <label> Генеральный директор:
   <input type="text" name="CEO" autocomplete="off"> <br />
   </label>

  <label> Банк:
   <input type="text" name="bank" autocomplete="off"> <br />
   </label>

  <label> Рассчетный счет:
   <input type="text" name="payment_account" autocomplete="off"> <br />
   </label>

  <label> Корреспондентский счет:
   <input type="text" name="correspondent_account" autocomplete="off"> <br />
   </label>

  <label> БИК:
   <input type="text" name="BIK" autocomplete="off"> <br />
   </label>

  <label> Примечание:
   <input type="text" name="note" autocomplete="off"> <br />
   </label>

  <button type="submit" name="button"> Добавить </button>
</form>


</body>


</html>
