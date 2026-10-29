<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input name="name">
        <input name="age">
        <input name="salary">
        <input type="submit">
    </form>

    <?php
    if (!empty($_POST)){
        $link = mysqli_connect('localhost', 'root', '', 'mydb');    

        $name = $_POST['name'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];

        $query = "INSERT INTO users SET name='$name', age='$age', salary='$salary'";
        mysqli_query($link, $query) or die(mysqli_error($link));
    } 
    ?>
</body>
</html>