<!-- подключение к бд -->
<?
include "connect.php";
?>

<body class='d-flex flex-column min-vh-100'>
<!-- подключение шапки -->
<?
include "header.php";
?>
<div class="container mb-5">
    <h1 class='display-1 text-center m-5'>Личный кабинет</h1>
    <?
    // проверка на авторизацию
    if($_SESSION['login']!=''){
        $login=$_SESSION['login'];
        $pass=$_SESSION['pass'];
        // запрос
        $query="SELECT * FROM `user` WHERE `login`='$login'";
        // выполнение запроса
        $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_array($result);
        $fullname=$row[1];
    
    ?>
    <h3  class='mb-4'>Мои данные</h3>
    <p><span>ФИО: </span><?echo $row[1];?></p>
    <p><span>Логин: </span><?echo $row[2];?></p>
    <p><span>Серия и номер ВУ: </span><?echo $row[4];?></p>
    <p><span>Почта: </span><?echo $row[5];?></p>
    <p><span>Номер телефона: </span><?echo $row[6];?></p>

    <h3 class='mb-4'>Мои аренды</h3>
    <div class="grid">
    <?
    $i=1;
    // запрос
    $query="SELECT * FROM `application` WHERE `full_name`='$fullname'";
    // выполнение запроса
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){
    ?>
            <div class="card" style="width: 18rem;">
                <?
                // условие на картинку
                if($row[4]=='Новое'){
                    ?>
                    <img src="/assets/img/1.jpg" class="card-img-top" alt="...">
                    <?
                }elseif($row[4]=='Подтверждено'){
                    ?>
                    <img src="/assets/img/6.jpg" class="card-img-top" alt="...">
                    <?
                }elseif($row[4]=='Отменено'){
                    ?>
                    <img src="/assets/img/2.jpg" class="card-img-top" alt="...">
                    <?
                }                
                ?>
                <div class="card-body">
                    <h5 class="card-title">Аренда №<?echo $i++?></h5>
                    <p class="card-text">Номер авто: <?echo $row[2];?></p>
                    <p class="card-text">Дата аренды: <?echo $row[3];?></p>
                    <p class="card-text">Статус аренды: <?echo $row[4];?></p>
                </div>
            </div>    
            <?
            }
            ?>
        </div>

    <a href="application.php" class='btn btn-success w-100 p-3 fs-2 mt-5 rounded-pill'>Арендовать автомобиль</a>    
    <?
    // защита доступа
}else{
    echo "АВТОРИЗУЙСЯ!";
}
?> 
</div>
<!-- подключение подвала -->
<?
include "footer.php";
?>
</body>
</html>