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
    <h1 class='display-1 text-center m-5'>Аренда автомобиля</h1>
    <?
    // проверка на авторизацию
    if($_SESSION['login']!=''){
    $login=$_SESSION['login'];
    $query="SELECT * FROM `user` WHERE `login`='$login'";
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);
    $fullname=$row[1];
    // проверка на нажатие кнопки
    if($_POST['form_car']=='Арендовать'){
        $selectCar=$_POST['sel_car'];
        $dateCar=$_POST['date'];
        // запрос
        $query="INSERT INTO `application` (`full_name`,`num_car`,`date_car`,`status`) 
                                    VALUES ('$fullname','$selectCar','$dateCar','Новое')";
        // выполнение запроса
        $result=mysqli_query($conn,$query);
        // вывод сообщений
        echo "Вы успешно отправили заявление";
        echo "<a href='profile.php'>Перейти в личный кабинет</a>";
    }
    ?>
    <form action='application.php' method='post'>
        <div class="block_form">
        <select class="form-select" name='sel_car'>
            <option selected>Выберите автомобиль</option>
            <option value="Нива">Нива</option>
            <option value="Волга">Волга</option>
            <option value="Буханка">Буханка</option>
        </select>
        </div>
        <div class="block_form">
            Выберите дату аренды <input type="date" name="date">
        </div>
        
        <input type="submit" name='form_car' value='Арендовать' class='btn btn-success w-100 p-2 rounded-pill fs-2'>
    </form>
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