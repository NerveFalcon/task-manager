<?php
    if (isset($_SESSION['success'])) {
        echo "<strong style = 'color: green;'>" . $_SESSION['success'] . "</strong>";
        echo "<br>";
        unset($_SESSION['success']);
    } 

    if (isset($_SESSION['error'])) {
        echo "<strong style = 'color: red;'>" . $_SESSION['error'] . "</strong>";
        echo "<br>";
        unset($_SESSION['error']);
    }
?>

<form action = "" method = "post">
    <input type = "password" name = "password" placeholder = "Название" value = "<?= $data->password ?>">
    <input type = "text" name = "fio"  placeholder = "Описание" value = "<?= $data->fio ?>">
    <input type = "text" name = "mail"  placeholder = "Поиск" value = "<?= $data->mail ?>">
    <input type = "text" name = "login" value = "<?= $data->login ?>">
    <input type = "text" name = "login" value = "<?= $data->login ?>">

    <input type = "submit" value = "Сохранить">
    <input type = "submit" value = "Назад">
    <input type = "submit" value = "Отменить">
</form>