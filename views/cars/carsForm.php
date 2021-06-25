<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title> Добавление новой машины </title>
</head>


<body>

<form action="/cars/add" method="post">
  <label> Марка:
   <input type="text" name="brand"> <br />
   </label>

  <label> Гос. знак:
   <input type="text" name="state_sign_cars" autocomplete="off"> <br />
   </label>

  <label> ПТС:
   <input type="text" name="PTS_cars" autocomplete="off"> <br />
   </label>

  <label> СТС:
   <input type="text" name="STS_cars" autocomplete="off"> <br />
   </label>

  <label> VIN:
   <input type="text" name="VIN_cars" autocomplete="off"> <br />
   </label>

  <button type="submit" name="button"> Добавить </button>
</form>


</body>


</html>
