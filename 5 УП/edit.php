<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditPhp</title>
</head>
<body>  
    <?php 
    if (isset($_GET['id'])):
    ?>
    <?php
        $link = mysqli_connect('localhost', 'root', '', 'mydb');   
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $user = mysqli_fetch_assoc($result);
        ?>
        <form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
            <input name="name" value="<?= $user['name']?>">
            <input name="age" value="<?= $user['age']?>">
            <input name="salary" value="<?= isset($_GET['id'])? $user['salary']:'' ?>">
            <input type="submit">
        </form>
        <?php endif;?>
</body>
</html>