1. Привести все ф-ии типа $getLastMonthPrr = $prr->getLastMonthPrr($id); к функциям
 типа $LastMonthPrr = $prr->getLastMonthPrr($id); (префиксы get, set и т.д. оставить
 только в моделях, убрав их из контроллеров)

2. Сократить строку вызова из бд путем переименования таблиц с помощью AS (drivers AS D)

3. В таблице бд flights в колонке driver вместо ФИО прописать id drivers с соответствующей ссылкой
  Изменить в prrmodels функцию, где сравнивается ФИО с id drivers.
