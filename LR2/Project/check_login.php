<?php
require_once __DIR__.'/boot.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php if ($user) { ?>

    Вы вошли как <?=htmlspecialchars($user['name'])?>!
    <a href="logout.php" style="color: #74b1ff; font-weight: bold; text-decoration: none">Выйти</a>

<?php } else { ?>

    Вы не авторизованы.
    <br>

    <a href="registr.php">Зарегистрироваться</a>
    <a href="auth.php">Войти</a>

<?php } ?>