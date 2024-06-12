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
<h1 class='display-1 text-center m-5'>Регистрация</h1>

    <?
    // проверка на нажатие кнопки
    if($_POST['reg']=='Зарегистрироваться'){
        // переменнные
        $fullname=$_POST['fullname'];
        $login=$_POST['login'];
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];
        $license=$_POST['license'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $status=$_POST['status'];
        // запрос
        $query="SELECT * FROM `user` WHERE `login`='$login'";
        // выполнение запроса
        $result=mysqli_query($conn,$query);
        $num=mysqli_num_rows($result);
        // проверка паролей
        if($pass!=$pass2){
            echo "Пароли не совпадают";
            echo "<a href='reg.php'>Повторите попытку</a>";
        }else{
            $pass=$pass2;
            if($num>0){
                echo "Такой пользователь уже зарегистрирован";
                echo "<a href='reg.php'>Повторите попытку</a>";
            }
            else{
                // запрос
                $query="INSERT INTO `user` (`full_name`,`login`,`pass`,`license`,`email`,`phone`,`status`) 
                                    VALUES ('$fullname','$login','$pass','$license','$email','$phone','0')";
                // выполнение запроса
                $result=mysqli_query($conn,$query);
                // вывод сообщений
                echo "Вы успешно зарегистрировались";
                echo "<a href='auto.php'>Пройдите авторизацию</a>";
            }
            
        }
        
        
    }
    ?>
    <form action='reg.php' method='post'>
        <div class="mb-3">
            <label for="fullname" class="form-label fs-5">ФИО</label>
            <input type="text" class="form-control rounded-pill p-3" name="fullname">
        </div>
        <div class="mb-3">
            <label for="login" class="form-label fs-5">Логин</label>
            <input type="text" class="form-control rounded-pill p-3" name="login">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label fs-5">Пароль</label>
            <input type="password" class="form-control rounded-pill p-3" name="pass">
        </div>
        <div class="mb-3">
            <label for="pass2" class="form-label fs-5">Повторите пароль</label>
            <input type="password" class="form-control rounded-pill p-3" name="pass2">
        </div>
        <div class="mb-3">
            <label for="license" class="form-label fs-5">Серия и номер ВУ</label>
            <input type="text" class="form-control rounded-pill p-3" name="license">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fs-5">Почта</label>
            <input type="text" class="form-control rounded-pill p-3" name="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label fs-5">Номер телефона</label>
            <input type="text" class="form-control rounded-pill p-3" name="phone">
        </div>
        <input type="submit" name='reg' value='Зарегистрироваться' class='btn btn-success w-100 p-2 rounded-pill fs-2'>

    </form>
</div>

<?
// подключение подвала
include "footer.php";
?>
</body>
</html>