<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'mydb');
    $query = "SELECT * FROM test";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    $result = '';
    foreach ($data as $elem){
        $result .= '<p>';
        $result .= '<b>' . $elem['name'] . '</br>';
        $result .= '<b>' . $elem['age'] . '</br>';
        $result .= '<b>' . $elem['salary'] . '</br>';
        $result .= '</p>';
    } 
    echo $result;
    ?>

    <?php foreach ($data as $elem): ?>
        <p>
            <b><?= $elem['name'] ?></b>
            <b><?= $elem['age'] ?></b>
            <b><?= $elem['salary'] ?></b>
        </p>
    <?php endforeach; ?>
    </pre>

    <!-- ЗАДАНИЕ 1 -->
    <?php foreach ($data as $user): ?>
        <div>
            <h2><?= $user['name']?></h2>
            <p>
                <?= $user['age'] ?> years,
                <b><?= $user['salary'] ?></b>
            </p>
        </div>
    <?php endforeach; ?>

    <!-- ЗАДАНИЕ 2 -->
     <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>salary</th>
        </tr>
        <?php foreach ($data as $user): ?>
            <tr>
                <td><?= $user['id']?></td>
                <td><?= $user['name']?></td>
                <td><?= $user['age']?></td>
                <td><?= $user['salary']?></td>
            </tr>
            <?php endforeach; ?>
     </table>


     <!-- ЗАДАНИЕ 3 -->
      <?php 
    //   $del = $_GET['del'];
    //   $query = "DELETE FROM test WHERE id=$del";
    //   $link = mysqli_connect('localhost', 'root', '', 'mydb');
    //   mysqli_query($link, $query) or die(mysqli_error($link));
      ?>


    <!-- ЗАДАНИЕ 4 -->
    <!-- http://127.0.0.1/5.php?del=1 -->


    <!-- ЗАДАНИЕ 5 -->
    <?php
    $query = "SELECT * FROM test";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    foreach ($data as $user) {
        $id = $user['id'];
        $name = $user['name'];
        echo "<a href='?del=$id'>$name</a>" . ' ';
    }
    ?>


    <!-- ЗАДАНИЕ 6 -->
    <?php
    $query = "SELECT * FROM test";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    foreach ($data as $user) {
        $id = $user['id'];
        $name = $user['name'];
        echo "
            <ul>
                <li>$name <a href='?del=$id'>удалить</a>
            </ul>
        ";
    }
    ?>


    <!-- ЗАДАНИЕ 7 -->
    <?php
    $query = "SELECT * FROM test";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    foreach ($data as $user) {
        $id = $user['id'];
        $name = $user['name'];
        $age = $user['age'];
        $salary = $user['salary'];
        echo "
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>age</th>
                    <th>salary</th>
                    <th>delete</th>
                </tr>
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$age</td>
                    <td>$salary</td>
                    <td><a href='?del=$id'>удалить</a></td>
                </tr>
            </table>
        ";
    }
    ?>


    <div>
        <h1><?=  $user['name'] ?></h1>
        <p>
            age: <span class"age"><?=  $user['age'] ?></span>
            salary: <span class"salary"><?=  $user['salary'] ?></span>
        </p>
    </div>
    <?php
        // $id = $_GET['id'];
        // $query = "SELECT * FROM test WHERE id=$id";
        // $result = mysqli_query($link, $query) or die(mysqli_error($link));
        // $user = mysqli_fetch_assoc($result);
    ?>



    <?php
    $query = "SELECT * FROM users";
    $link = mysqli_connect('localhost', 'root', '', 'mydb');
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    $result = '';
    foreach ($data as $elem) {
        $result .= '<p>';
        $result .= '<b>' . $elem['name'] . '</b>';
        $result .= '<b>' . $elem['age'] . '</b>';
        $result .= '<b>' . $elem['salary'] . '</b>';

        $result .= '</p>';
        }
    echo $result;

    ?>
    <?php foreach ($data as $elem): ?>
    <b><?= $elem['name'] ?></b>
    <b><?= $elem['age'] ?></b>
    <b><?= $elem['salary'] ?></b>
    <?php endforeach; ?>



    <!-- 8 ЗАДАНИЕ -->
    <!-- На странице show.php -->


    <!-- 9 ЗАДАНИЕ -->
    <?php foreach ($data as $elem): ?>
    <a href="show.php?id='<?= $elem['id'] ?>'"><?= $elem['name'] ?></a>
    <?php endforeach; ?>

    <!-- 14 ЗАДАНИЕ -->
    <?php foreach ($data as $elem): ?>
    <ul>
        <li><?= $elem['name'] ?> <a href="edit.php?id=<?= $elem['id'] ?>">EDIT</a></li>
    </ul>
    <?php endforeach; ?>
    
</body>
</html>


