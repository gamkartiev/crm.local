<div class="logo"> <img src="#" alt="Тут должен быть логотип компании"></div>
<div class="menu">

  <ul>
    <li><a href="/flights"> Рейсы</a></li>
    <!-- <li><a href="/actual"> Оперативка</a></li> -->
    <li><a href="/drivers"> Водители</a></li>
    <li><a href="/cars"> Машины </a></li>
    <li><a href="/trailers"> Прицепы </a></li>
    <li><a href="/customers"> Клиенты </a></li>
    <li><a href="/financePlan"> Финансовый план на месяц</a></li>
    <?php if(!empty($_SESSION['login'])): ?>
      <ul>
        <li> <?= $_SESSION['login'] ?></li>
        <li> <a href="/auth/output"> Выход </a></li>
        <!-- <li><a href="/auth/registration"> Регистрация </a></li> -->
      </ul>
    <?php endif; ?>
  </ul>
</div>
