<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SavePHP</title>
</head>
<body>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'mydb');   

    $id = $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

    $query = "UPDATE users SET name='$name', age='$age', salary='$salary' WHERE id=$id";
    mysqli_query($link, $query) or die(mysqli_error($link));
    echo 'Юзер успешно изменен!!!!!!!!';
    ?>
</body>
</html>