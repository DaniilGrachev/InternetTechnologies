<?php

require_once __DIR__.'/boot.php';




if(!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
    flash('Указан невалидный email');
    header('Location: registr.php');
    die();

}

$password = $_POST['password1'];
error_reporting(0);
$pasLen = strlen($password);
$pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[@$!%*#?&^+=)(\\\.,])(?=.*\s)(?=.*[-_])(?=.*\d)[A-Za-z\d@$!%&^+=)(*#?\s\-_.]{6,}$/';

if (!preg_match($pattern, $password, $match))
{
    flash('Указан невалидный пароль');
    header('Location: registr.php');
    die();

}
error_reporting(E_ALL);


// Проверим, не занят ли login пользователя
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` = :login");
$stmt->execute(['login' => $_POST['login']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /LR2/Project/exhibition.php'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}

// Добавим пользователя в базу
// Добавим пользователя в базу
$stmt = pdo()->prepare("INSERT INTO `users` (`login`, `password`, `name`, `fullname`, `birth`, `address`, `gender`, `interests`, `vk_link`, `blood_type`, `rh_factor`) VALUES (:login, :password, :name, :fullname, :birth, :address, :gender, :interests, :link, :blood, :factor)");
$stmt->execute([
    'login' => $_POST['login'],
    'password' => password_hash($_POST['password1'], PASSWORD_DEFAULT),
    'name' => htmlspecialchars($_POST['name']),
    'fullname' => htmlspecialchars($_POST['fullname']),
    'birth' => $_POST['birth'],
    'address' => $_POST['address'],
    'gender' => $_POST['gender'],
    'interests' => $_POST['interests'],
    'link' => $_POST['link'],
    'blood' => $_POST['blood'],
    'factor' => $_POST['factor']
]);


header('Location: /LR2/Project/exhibition.php');

?>