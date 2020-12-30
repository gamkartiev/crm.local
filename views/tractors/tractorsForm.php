<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Добавление нового рейса </title>
  </head>
  <body>

<form action="/tractors/add" method="post">

  <label for="brand"> Марка: </label>
    <input type="text" name="brand" id="brand"> <br />

  <label for="state_sign_tractor"> Гос. знак: </label>
    <input type="text" name="state_sign_tractor" id="state_sign_tractor" autocomplete="off"> <br />

  <label for="PTS_tractor"> ПТС: </label>
    <input type="text" name="PTS_tractor" value="" id="PTS_tractor" autocomplete="off"> <br />

  <label for="STS_tractor"> СТС: </label>
    <input type="text" name="STS_tractor" value="" id="STS_tractor" autocomplete="off"> <br />

  <label for="VIN_tractor"> VIN: </label>
    <input type="text" name="VIN_tractor" value="" id="VIN_tractor" autocomplete="off"> <br />


<button type="submit" name="button"> Добавить </button>

</form>


  </body>
</html>
