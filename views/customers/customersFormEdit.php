<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/customers/edit/<?=$id?>" method="post">
  <label> Название компании:
   * <input type="text" name="name" value="<?=$oneCustomerName['0']['name']?>" required> <br />
   </label>

  <label> Короткое название:
   <input type="text" name="short_name" value="<?=$oneCustomerName['0']['short_name']?>"> <br />
   </label>

  <label> ИНН:
   <input type="text" name="INN" value="<?=$oneCustomerName['0']['INN']?>" maxlength="12"> <br />
   </label>

  <label> ОГРН:
   <input type="text" name="OGRN" value="<?=$oneCustomerName['0']['OGRN']?>" maxlength="13"> <br />
   </label>

  <label> Фактический адрес:
   <input type="text" name="actual_address" value="<?=$oneCustomerName['0']['actual_address']?>"> <br />
   </label>

  <label> Юридический адрес:
   <input type="text" name="legal_address" value="<?=$oneCustomerName['0']['legal_address']?>"> <br />
   </label>

  <label> Почтовый адрес:
   <input type="text" name="mailing_address" value="<?=$oneCustomerName['0']['mailing_address']?>"> <br />
   </label>

  <label> КПП:
   <input type="text" name="KPP" value="<?=$oneCustomerName['0']['KPP']?>"> <br />
   </label>

  <label> ОКПО:
   <input type="text" name="OKPO_code" value="<?=$oneCustomerName['0']['OKPO_code']?>"> <br />
   </label>

  <label> ОКФС:
   <input type="text" name="OKFC_code" value="<?=$oneCustomerName['0']['OKFC_code']?>">
   </label>

  <label> ОКОПФ:
   <input type="text" name="OKOPF_code" value="<?=$oneCustomerName['0']['OKOPF_code']?>"> <br />
   </label>

  <label> Основной код ОКВЕД:
   <input type="text" name="OKVED_main_code" value="<?=$oneCustomerName['0']['OKVED_main_code']?>"> <br />
   </label>

  <label> Генеральный директор:
   <input type="text" name="CEO" value="<?=$oneCustomerName['0']['CEO']?>"> <br />
   </label>

  <label> Банк:
   <input type="text" name="bank" value="<?=$oneCustomerName['0']['bank']?>"> <br />
   </label>

  <label> Рассчетный счет:
   <input type="text" name="payment_account" value="<?=$oneCustomerName['0']['payment_account']?>"> <br />
   </label>

  <label> Корреспондентский счет:
   <input type="text" name="correspondent_account" value="<?=$oneCustomerName['0']['correspondent_account']?>"> <br />
   </label>

  <label> БИК:
   <input type="text" name="BIK" value="<?=$oneCustomerName['0']['BIK']?>"> <br />
   </label>

  <label> Примечание:
   <input type="text" name="note" value="<?=$oneCustomerName['0']['note']?>"> <br />
   </label>

  <button type="submit" name="button"> Отправить </button>
</form>


  </body>
</html>
