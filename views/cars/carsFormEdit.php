<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Изменение даннх машины </title>
  </head>
  <body>

<form action="/cars/edit/<?=$id?>" method="post">
  <label> Марка:
   <input type="text" name="brand" value="<?=$oneCarsName['0']['brand']?>"> <br />
   </label>

  <label> Гос. знак:
   <input type="text" name="state_sign_cars" value="<?=$oneCarsName['0']['state_sign_cars']?>" autocomplete="off"> <br />
   </label>

  <label> ПТС:
   <input type="text" name="PTS_cars" value="<?=$oneCarsName['0']['PTS_cars']?>" autocomplete="off"> <br />
   </label>

  <label> СТС:
   <input type="text" name="STS_cars" value="<?=$oneCarsName['0']['STS_cars']?>" autocomplete="off"> <br />
   </label>

  <label> VIN:
   <input type="text" name="VIN_cars" value="<?=$oneCarsName['0']['VIN_cars']?>" autocomplete="off"> <br />
   </label>

  <button type="submit" name="button"> Отправить </button>
</form>


  </body>
</html>
