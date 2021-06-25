<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Изменение данных прицепа </title>
  </head>
  <body>

<form action="/trailers/edit/<?=$id?>" method="post">

  <label> Марка:
   <input type="text" name="brand" value="<?=$oneTrailerName['0']['brand']?>"> <br />
   </label>
  <label> Гос. знак:
   <input type="text" name="state_sign_trailer" value="<?=$oneTrailerName['0']['state_sign_trailer']?>" autocomplete="off"> <br />
   </label>

  <label> ПТС:
   <input type="text" name="PTS_trailer" value="<?=$oneTrailerName['0']['PTS_trailer']?>" autocomplete="off"> <br />
   </label>

  <label> СТС:
   <input type="text" name="STS_trailer" value="<?=$oneTrailerName['0']['STS_trailer']?>" autocomplete="off"> <br />
   </label>

  <label> VIN:
   <input type="text" name="VIN_trailer" value="<?=$oneTrailerName['0']['VIN_trailer']?>" autocomplete="off"> <br />
   </label>

<button type="submit" name="button"> Отправить </button>

</form>


  </body>
</html>
