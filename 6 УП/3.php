<?php
session_start();
if (!empty($_SESSION['auth'])): 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 page</title>
</head>
<body>
    <p>Ваш логин: <?php echo $_SESSION['UserLogin']; ?></p>
</body>
</html>
<?php else: ?>
    <!-- Задание 5 -->
    <p>пожалуйста авторизируйтесь - <a href="login.php">Нажать</a></p>
<?php endif; ?>