<?
// старт сессии
session_start();
?>

<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid container">
    <a class="navbar-brand text-white" href="index.php">Эх, прокачу!</a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?
        // проверка на авторизацию
        if($_SESSION['login']!=''){
        ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="profile.php">Личный кабинет</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php?out=yes">Выход</a>
        </li>
        <?
        // проверка на админа
        if($_SESSION['status']=='1'){
            
        ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin.php">Админ панель</a>
        </li>
        <?       
            }    
        }
        else{
        ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="auto.php">Авторизация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="reg.php">Регистрация</a>
        </li>
        <?
        }
        ?>
      </ul>
    </div>
  </div>
</nav>