<?
// подключение к бд
include "connect.php";
// удаление сессии
if($_GET['out']=='yes') session_destroy();
?>

<body class='d-flex flex-column min-vh-100 img5'>
<!-- подключение шапки -->
<?
include "header.php";
?>
<div class="container">
    <h1 class='display-1 text-center text-white pt-5'>Эх прокачу!</h1>
    <h2 class='text-center text-white pt-5'>Наш сервис для автоматизации процесса бронирования «Эх, прокачу!» 
        представляет собой информационную систему для предварительного бронирования автомобиля из автопарка компании.</h2>
    <a href="application.php" class='btn btn-dark w-100 p-3 fs-2 mt-5 rounded-pill'>Арендовать автомобиль</a>    
</div>





<!-- подключение подвала -->
<?
include "footer.php";
?>
</body>
</html>