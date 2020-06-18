<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/add" method="post">
  <input type="hidden" name="action" value="addNewFlight">
  <label for="place_1"> Откуда: </label>
    <input type="text" name="place_1" placeholder="откуда" id="place_1"> <br />

  <label for="place_2"> Куда: </label>
    <input type="text" name="place_2" value="" id="place_2"> <br />

  <label for="date_1"> Дата загрузки: </label>
    <input type="date" name="date_1" value="" id="date_1"> <br />

  <label for="date_2"> Дата выгрузки: </label>
    <input type="date" name="date_2" value="" id="date_2"> <br />

  <label for="freight"> Название груза: </label>
    <input type="text" name="freight" value="" id="freight"> <br />

  <label for="weight"> Вес: </label>
    <input type="number" name="weight" value="" id="weight"> <br />

  <label for="volume"> Объем: </label>
    <input type="number" name="volume" value="" id="volume"> <br />

  <label for="cost"> Сумма: </label>
    <input type="text" name="cost" value="" id="cost"> <br />

  <!-- <label for="formOfPayment"> Форма оплаты: </label>
    <input type="text" name="formOfPayment" value="" id="formOfPayment"> <br /> -->

  <!-- <label for=""> Условия оплаты </label>
    <input type="text" name="" value="" id=""> -->

  <!-- <label for=""> Компания: </label>
    <input type="text" name="" value="" id=""> <br /> -->

  <!-- <label for=""> Логист: </label>
    <input type="text" name="" value="" id=""> <br /> -->

  <!-- <label for=""> Доверенность: </label>
    <input type="text" name="proxy" value="" id=""> <br />

  <label for="request"> Заявка: </label>
    <input type="text" name="request" value="" id=""> <br />

  <label for=""> Примечание: </label>
    <input type="text" name="note" value="" id=""> <br /> -->
<button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
