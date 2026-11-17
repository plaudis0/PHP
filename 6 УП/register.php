<?php
session_start();

$errors = [];


$countries = ['Россия', 'США', 'Казахстан', 'Москва'];

if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['birthday']) and !empty($_POST['confirm'])) {
    if ($_POST['password'] == $_POST['confirm']){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $created_at = date('Y-m-d H:i:s');
        $date = DateTime::createFromFormat('d.m.Y', $birthday);
        $country = $_POST['country'];
    
        $link = mysqli_connect('localhost', 'root', '', 'mydb');
        $query = "SELECT * FROM login WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        if (empty($user)){
            if (!preg_match('/^[a-z0-9]+$/i', $login)) {
                $errors['login'] = 'Логин могет содержать только латински буквы и циферки';
            }
            elseif (strlen($login) < 4 || strlen($login) > 10){
                $errors['login'] = 'длина логина должна быть от 4 до 10 символов';
            }
            elseif (strlen($password) < 6 || strlen($password) > 12){
                $errors['password'] = 'длина пароля должна быть от 6 до 12 символов (бред какой та)';
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email введён некорректно';
            }
            elseif (!$date || $date->format('d.m.Y') !== $birthday){
                $errors['birthday'] = 'Дата должна быть в формате день.месяц.год';
            }
            elseif ($date > new DateTime()) {
                $errors['birthday'] = 'Дата рождения не может быть в будущем...';
            }
            elseif (!in_array($country, $countries, true)) {
                $errors['country'] = 'Выберите страну из списка.';
            }
            else {
                $query = "INSERT INTO login SET login='$login', password='$password', email='$email', birthday='$birthday', country='$country', created_at='$created_at'";
                mysqli_query($link, $query);
    
                $_SESSION['auth'] = true; // челик авторизован
                $id = mysqli_insert_id($link);
                $_SESSION['id'] = $id;
            }
        }
        else echo "Братиш я понимаю что тебе понравился такой логин но он уже занят каким то лошком((";
    
    }
    else echo "Пароли при регистрации чота не совпали чувак";
}
else echo "Пустым низя оставлять поля братиш";


if (!empty($errors)) {
    echo '<div id="error-form">';
    foreach ($errors as $error) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    echo '</div>';
}

?>


<form action="" method="POST">
    <?php if (!empty($errors['login'])): ?>
        <p style="color: red;"><?= htmlspecialchars($errors['login']) ?></p>
    <?php endif; ?>
    <input name="login" placeholder="Логин введи блин" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
    <?php if (!empty($errors['password'])): ?>
        <p class="errors-message"><?= htmlspecialchars($errors['password']) ?></p>
        <?php endif; ?>
        <input name="password" type="password" placeholder="А пароль че вводить не надо?!">
        <input type="password" name="confirm" placeholder="подтверди пароль а то малоли забыл">
        <?php if (!empty($errors['email'])): ?>
            <p style="color: red;"><?= htmlspecialchars($errors['email']) ?></p>
        <?php endif; ?>
        <input name="email" type="email" placeholder="Мыло свое давай сюда" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <?php if (!empty($errors['birthday'])): ?>
            <p style="color: red;"><?= htmlspecialchars($errors['birthday']) ?></p>
        <?php endif; ?>
        <input name="birthday" placeholder="ну дршку тожэ напиши малоли" value="<?= htmlspecialchars($_POST['birthday'] ?? '') ?>">
        
        <select name="country">
            <option value="">Выберите страну</option>
            <option value="Россия">Россия</option>
            <option value="США">США</option>
            <option value="Казахстан">Казахстан</option>
            <option value="Москва">Москва</option>
        </select>
        
        <input type="submit">
</form>
<span id="errors"></span>