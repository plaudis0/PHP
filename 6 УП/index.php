<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uspeh</title>
</head>
<body>
    <p>текст для любого челика</p>
    <?php
    session_start();
    if (isset($_SESSION['Complited'])) {
        echo $_SESSION['Complited'];
        unset($_SESSION['Complited']);
    }

    if (!empty($_SESSION['auth'])){
        echo "У тебя есть сессия!<br>";
        // Задание 6
        echo "Этот текст видно только авторизованным челикам<br>";
        // 
        echo "Ваш логин: ".$_SESSION['UserLogin'];
    }
    ?>
</body>
</html>