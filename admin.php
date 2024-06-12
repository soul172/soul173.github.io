<!-- Подключение БД -->
<?
include "connect.php";
?>

<body class='d-flex flex-column min-vh-100'>
<!-- Подключение шапки -->
<?
include "header.php";
?>
<div class="container mb-5">
    <h1 class='display-1 text-center m-5'>Админ панель</h1>
    <?
    // Проверка на админа
    if($_SESSION['status']=='1'){
        // Проверка на нажатие кнопки
        if($_POST['delete']=='Удалить заявление'){
            $id=$_POST['id_dlt'];
            $query="DELETE FROM `application` WHERE `id`='$id'";
            mysqli_query($conn,$query);
            echo "Вы успешно удалили статус";
            echo "<a href='admin.php'>Обновите страницу</a>";
        }
        
        // Проверка на нажатие кнопки
        if($_POST['submit']=='Изменить статус'){
            $newStatus=$_POST['new_status'];
            $id=$_POST['id'];
            // запрос на вывод данных
            $query="UPDATE `application` SET `status`='$newStatus' WHERE `id`='$id'";
            // выполнение запроса
            mysqli_query($conn,$query);
            echo "Вы успешно изменили статус";
            echo "<a href='admin.php'>Обновите страницу</a>";
        }
    ?>
    <table class='table'>
        <tr>
            <th scope="col">#</td>
            <th scope="col">Имя подавшего</td>
            <th scope="col">Телефон подавшего</td>
            <th scope="col">Почта подавшего</td>
            <th scope="col">Вид машины</td>
            <th scope="col">Дата аренды</td>
            <th scope="col">Статус</td>
            <td></td>
        </tr>
    <?
    $i=1;
    // запрос на вывод данных
    $query="SELECT user.full_name, user.phone, user.email, application.id, application.num_car, application.date_car,application.status 
    FROM `user` JOIN `application` on application.full_name=user.full_name";
    // выполнение запроса
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){
    ?>
        <tr>
            <th scope="row"><?echo $i++;?></td>
            <td><?echo $row[0];?></td>
            <td><?echo $row[1];?></td>
            <td><?echo $row[2];?></td>
            <td><?echo $row[4];?></td>
            <td><?echo $row[5];?></td>
            <td><?echo $row[6];?></td>
            <td>
                <?if($row[6]=='Новое'){?>
                    <form action="admin.php" method='post'>
                    <select name="new_status">
                        <option value="Подтверждено">Подтвердить</option>
                        <option value="Отменено">Отменить</option>
                    </select>
                    <input type="hidden" name='id' value='<?echo $row[3];?>'>
                    <input type="submit" name='submit' value='Изменить статус'>
                    </form>
                    <?
                    }
                    ?>
            </td>
            <td>
                <form action="admin.php" method='post'>
                    <input type="hidden" name='id_dlt' value='<?echo $row[3];?>'>
                    <input type="submit" name="delete" value='Удалить заявление'>
                </form>
            </td>

        </tr>
            <?
            }
            ?>
     </table>

    <?
    // защита доступа
}else{
    echo "Не хватает прав доступаа!";
}
?> 
</div>
<!-- подключение подвала -->
<?
include "footer.php";
?>
</body>
</html>