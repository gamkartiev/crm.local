<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
  <meta charset="utf-8">
  <title> Добавление нового прицепа </title>
</head>


<body>

<form action="/trailers/add" method="post">
  <label for="brand"> Марка: </label>
  <input type="text" name="brand" id="brand"> <br />

  <label for="state_sign_trailer"> Гос. знак: </label>
  <input type="text" name="state_sign_trailer" id="state_sign_trailer" autocomplete="off"> <br />

  <label for="PTS_trailers"> ПТС: </label>
  <input type="text" name="PTS_trailer" value="" id="PTS_trailer" autocomplete="off"> <br />

  <label for="STS_trailers"> СТС: </label>
  <input type="text" name="STS_trailer" value="" id="STS_trailer" autocomplete="off"> <br />

  <label for="VIN_trailers"> VIN: </label>
  <input type="text" name="VIN_trailer" value="" id="VIN_trailer" autocomplete="off"> <br />


<button type="submit" name="button"> Добавить </button>
</form>


</body>
</html>
