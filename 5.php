<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <b>user1</b>
        <b>23</b>
        <b>400</b>
    </p>
    <p>
        <b>user2</b>
        <b>24</b>
        <b>500</b>
    </p>
    <p>
        <b>25</b>
        <b>600</b>
    </p>

    <!-- ЗАДАНИЕ 1 -->
    <div>
        <h2>user1</h2>
        <p>23 years, <b>400$</b></p>
    </div>
    <div>
        <h2>user2</h2>
        <p>24 years, <b>500$</b></p>
    </div>
    <div>
        <h2>user3</h2>
        <p>25 years, <b>600$</b></p>
    </div>


    <!-- ЗАДАНИЕ 2 -->
     <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>salary</th>
        </tr>
        <tr>
            <td>1</td>
            <td>user1</td>
            <td>23</td>
            <td>400</td>
        </tr>
        <tr>
            <td>2</td>
            <td>user2</td>
            <td>25</td>
            <td>500</td>
        </tr>
        <tr>
            <td>3</td>
            <td>user3</td>
            <td>23</td>
            <td>500</td>
        </tr>
     </table>


     <!-- ЗАДАНИЕ 3 -->
      <?php 
      $del = $_GET['del'];
      $query = "DELETE FROM test WHERE id=$del";
      $link = mysqli_connect('localhost', 'root', '', 'mydb');
      mysqli_query($link, $query) or die(mysqli_error($link));
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
        $id = $_GET['id'];
        $query = "SELECT * FROM test WHERE id=$id";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $user = mysqli_fetch_assoc($result);
    ?>
</body>
</html>

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