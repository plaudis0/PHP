<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlaBlao</title>
</head>
<body>
    <!-- ЗАДАНИЕ 1 -->
    <?php 
    session_start();
    // Задание 2 (закрыть форму при успешной авторизации)
    if (!isset($_POST['password'])): ?> 
    <form action="" method="POST" class="auth-form">
        <input name="login">
        <input name="password" type="password">
        <input type="submit">
    </form>
    <?php endif; ?>

    <?php 
    if (!empty($_POST['password']) and !empty($_POST['login'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $link = mysqli_connect('localhost', 'root', '', 'mydb');   
        $query = "SELECT * FROM login WHERE login='$login' AND password='$password'";
        $res = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($res);

        if (!empty($user)){
            $_SESSION['auth'] = true;
            echo "user authorized";
            // Задание 4
            $_SESSION['Complited'] = 'Вы вошли успешно крч';
            $_SESSION['UserLogin'] = $login;
            // Задание 3 
            header('Location: index.php');
            die();
        }

        else {
            echo "Неверный пароль йоу";
        }
    }
    ?>
</body>
</html>