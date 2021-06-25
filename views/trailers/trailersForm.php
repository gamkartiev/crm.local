<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
  <meta charset="utf-8">
  <title> Добавление нового прицепа </title>
</head>


<body>

<form action="/trailers/add" method="post">
  <label> Марка:
   <input type="text" name="brand"> <br />
   </label>

  <label> Гос. знак:
   <input type="text" name="state_sign_trailer" autocomplete="off"> <br />
   </label>

  <label> ПТС:
   <input type="text" name="PTS_trailer" autocomplete="off"> <br />
   </label>

  <label> СТС:
   <input type="text" name="STS_trailer" autocomplete="off"> <br />
   </label>

  <label> VIN:
   <input type="text" name="VIN_trailer" autocomplete="off"> <br />
   </label>

  <button type="submit" name="button"> Добавить </button>
</form>


</body>
</html>
