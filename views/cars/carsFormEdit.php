<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Изменение даннх машины </title>
  </head>
  <body>

<form action="/cars/edit/<?=$id?>" method="post">
  <label> Марка:
   <input type="text" name="brand" value="<?=$oneCarName['0']['brand']?>"> <br />
   </label>

  <label> Гос. знак:
   <input type="text" name="state_sign_cars" value="<?=$oneCarName['0']['state_sign_cars']?>" autocomplete="off"> <br />
   </label>

  <label> ПТС:
   <input type="text" name="PTS_cars" value="<?=$oneCarName['0']['PTS_cars']?>" autocomplete="off"> <br />
   </label>

  <label> СТС:
   <input type="text" name="STS_cars" value="<?=$oneCarName['0']['STS_cars']?>" autocomplete="off"> <br />
   </label>

  <label> VIN:
   <input type="text" name="VIN_cars" value="<?=$oneCarName['0']['VIN_cars']?>" autocomplete="off"> <br />
   </label>



   <br /> <br />
   <input type="hidden" name="id_drivers_work_shedule" value="<?= $drivers_work_shedule['0']['id_drivers_work_shedule']?>">
   <label> Водитель:
   <select name="id_drivers" required>
        <option disabled>Выберите водителя:</option>
        <?php foreach ($drivers as $a): ?>
        <option value="<?=$a['id']?>"> <?= $a['driver']?> </option>
        <?php endforeach; ?>
    </select> <br />
    </label><br />

    <label> Дата начала работы:
      <input type="date" name="start" value="<?=$drivers_work_shedule['0']['start']?>" > <br />
    </label> <br />

    <label> Дата окончания работы:
      <input type="date" name="the_end" value="<?=$drivers_work_shedule['0']['the_end']?>" > <br />
    </label> <br />



  <button type="submit" name="button"> Отправить </button>
</form>


  </body>
</html>
