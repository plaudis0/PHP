<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 ЗАДАНИЕ УП</title>
</head>
<body>
    <div>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'mydb');
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
    ?>
        <h1><?= $user['name'] ?></h1>
        <p>
            age: <span class="age"><?= $user['age'] ?></span>
            salary: <span class="salary"><?= $user['salary'] ?></span>
        </p>
    </div>

<!-- 8 ЗАДАНИЕ -->
    <div>
        <p>
            Имя: <span class="name"><?= $user['name'] ?></span>
        </p>
        <p>
            Возраст: <span class="age"><?= $user['age'] ?></span>
            Зарплата: <span class="salary"><?= $user['salary'] ?></span>
        </p>
    </div>
</body>
</html>