<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Изменение данных прицепа </title>
  </head>
  <body>

<form action="/trailers/edit/<?=$id?>" method="post">

  <label for="brand"> Марка: </label>
  <input type="text" name="brand" value="<?=$oneTrailerName['0']['brand']?>" id="brand"> <br />

  <label for="state_sign_trailer"> Гос. знак: </label>
  <input type="text" name="state_sign_trailer" value="<?=$oneTrailerName['0']['state_sign_trailer']?>" id="state_sign_trailer" autocomplete="off"> <br />

  <label for="PTS_trailer"> ПТС: </label>
  <input type="text" name="PTS_trailer" value="<?=$oneTrailerName['0']['PTS_trailer']?>" id="PTS_trailer" autocomplete="off"> <br />

  <label for="STS_trailer"> СТС: </label>
  <input type="text" name="STS_trailer" value="<?=$oneTrailerName['0']['STS_trailer']?>" id="STS_trailer" autocomplete="off"> <br />

  <label for="VIN_trailer"> VIN: </label>
  <input type="text" name="VIN_trailer" value="<?=$oneTrailerName['0']['VIN_trailer']?>" id="VIN_trailer" autocomplete="off"> <br />

<button type="submit" name="button"> Отправить </button>

</form>


  </body>
</html>
