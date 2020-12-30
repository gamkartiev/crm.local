<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/cars/add" method="post">

  <label for="brand"> Марка: </label>
    <input type="text" name="brand" id="brand"> <br />

  <label for="state_sign_cars"> Гос. знак: </label>
    <input type="text" name="state_sign_cars" id="state_sign_cars" autocomplete="off"> <br />

  <label for="PTS_cars"> ПТС: </label>
    <input type="text" name="PTS_cars" value="" id="PTS_cars" autocomplete="off"> <br />

  <label for="STS_cars"> СТС: </label>
    <input type="text" name="STS_cars" value="" id="STS_cars" autocomplete="off"> <br />

  <label for="VIN_cars"> VIN: </label>
    <input type="text" name="VIN_cars" value="" id="VIN_cars" autocomplete="off"> <br />

  <!-- <label for="year_cars"> Год машины: </label>
    <input type="date" name="year_cars" value="" id="year_cars"> <br /> -->

  <!-- <label for="attached_trailer"> Полуприцеп: </label>
    <input type="text" name="attached_trailer" value="" id="attached_trailer"> <br />

  <label for="date_1"> Прицеп прицепили в: </label>
    <input type="date" name="date_1" value="" id="date_1"> <br /> -->

<button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
