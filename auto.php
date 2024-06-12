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
    <h1 class='display-1 text-center m-5'>Авторизация</h1>
    <?
    // проверка на нажатие кнопки
    if($_POST['auto']=='Авторизоваться'){
        $login=$_POST['login'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        // запрос с проверкой логина и пароля
        $query="SELECT * FROM `user` WHERE `login`='$login' or `email`='$email' and `pass`='$pass'";
        // выполнение запроса
        $result=mysqli_query($conn,$query);
        $num=mysqli_num_rows($result);
        // проверка на существующего пользователя
        if($num==1){
            $_SESSION['login']=$login;
            $_SESSION['pass']=$pass;

            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_array($result)){
                // присвоение статуса к сессии
                $_SESSION['status']=$row[7];
                // проверка на админа
                if($_SESSION['status']=='1'){
                    echo "Вы успешно авторизовались";                    
                    echo "<a href='profile.php'>Перейдите в личный профиль</a>";                    
                    echo "<a href='admin.php'>Перейдите в админ панель</a>";                    
                }else{
                    echo "Вы успешно авторизовались";                    
                    echo "<a href='profile.php'>Перейдите в личный профиль</a>";     
                }
            }
            
        }else{
            echo "Логин или пароль не верны";                    
            echo "<a href='auto.php'>Повторите попытку</a>";   
        }
    }
    ?>
    <form action='auto.php' method='post'>
        <div class="mb-3">
            <label for="login" class="form-label fs-5">Логин / почта</label>
            <input type="text" class="form-control rounded-pill p-3" name="login">
            <input type="hidden" class="form-control rounded-pill p-3" name="email">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label fs-5">Пароль</label>
            <input type="password" class="form-control rounded-pill p-3" name="pass">
        </div>
        <input type="submit" name='auto' value='Авторизоваться' class='btn btn-success w-100 p-2 rounded-pill fs-2'>

    </form>
</div>
<!-- подключение подвала -->
<?
include "footer.php";
?>
</body>
</html>