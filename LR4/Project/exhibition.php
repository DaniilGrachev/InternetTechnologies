<?php
/** @var array $result */
/** @var array $variables */
/** @var array $variablesRus */
/** @var array $intersect */
require_once 'logic.php';


?>
<!DOCTYPE html>
<html lang="ru">

<head class="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LR2</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="grachev_scripts.js"></script>

</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/Project/exhibition.php">Третьяковская галерея</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-4">
                <li class="nav-item">
                    <a class="nav-link" href="#">Купить билет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Стать другом</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Интернет-магазин</a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="text-align: right; margin-right: 100px;">
    <?php require_once "check_login.php"; ?>
    </div>
    <div style="background-color: grey; height: 1px; margin-left: 90px; margin-right: 90px"></div>

    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav ml-4 w-100 d-flex justify-content-around">
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Посетителям</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Выставки</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">События</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Кино</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Программы и абонементы</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Коллекция</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Поддержать музей</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Третьяковка онлайн</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">О музее</a>
            </li>
        </ul>
    </nav>

    <div style="background-color: grey; height: 1px; margin-left: 90px; margin-right: 90px"></div>

    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav w-50 d-flex">
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Главная</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Выставки</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="#" style="color: black">Архив выставок</a>
            </li>
        </ul>
    </nav>
    <p class="main"></p>
</header>

<main>
    <?php if (check_auth()) { ?>
        <div class="container text-center mt-3">
            <form method="get" style="text-align: left; width: 40%">
                <table style="width: 100%">
                    <?php foreach ($variablesRus as $k => $v) { ?>
                        <tr>
                            <td><label for="<?= $k ?>"><?= $v ?></label></td>
                            <td><input type="text" name="<?= $k ?>" value="<?= array_key_exists($k, $intersect) ? $intersect[$k] : ''?>"></td>
                        </tr>
                    <?php } ?>
                    <tr><td></td><td><button type="submit">Запросить</button></td></tr>
                    <tr><td></td><td><button onclick="document.querySelectorAll('input').forEach((k)=>{k.value = ''})">Сбросить</button></td></tr>
                </table>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Картина</th>
                    <th scope="col">Художник</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Зал</th>
                    <th scope="col">Дата создания</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $item): ?>
                    <tr>
                        <td><img src="images/catalog/<?= $item[0]; ?>" height="150px" alt="<?= $item[0]; ?>"></td>
                        <td><?= $item[1]; ?></td>
                        <td><?= $item[2]; ?></td>
                        <td><?= $item[3]; ?></td>
                        <td><?= $item[4]; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <h2 style="height: 100px; display: flex; align-items: center; justify-content: center; font-family: sans-serif">Чтобы видеть содержимое этой части страницы, <a href="auth.php">Войдите</a>.</h2>
    <?php } ?>
</main>

<footer class="text-center pt-4 pt-md-5 border-top" style="background-color: black">
    <div class="row">
        <div class="col-6 col-md">
            <h5 style="color: white">О Музее</h5>
            <ul class="list-unstyled text-small">
                <li><a href="#" class="link-secondary">Ответы на частые вопросы</a></li>
                <li><a href="#" class="link-secondary">История</a></li>
                <li><a href="#" class="link-secondary">Проекты</a></li>
                <li><a href="#" class="link-secondary">Попечительский совет</a></li>
                <li><a href="#" class="link-secondary">Фонд поддержки</a></li>
                <li><a href="#" class="link-secondary">Контакты</a></li>
                <li><a href="#" class="link-secondary">Карта сайта</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5 style="color: white">Выставки</h5>
            <ul class="list-unstyled text-small">
                <li><a href="#" class="link-secondary">Текущие выставки</a></li>
                <li><a href="#" class="link-secondary">Будущие выставки</a></li>
                <li><a href="#" class="link-secondary">Внешние выставки</a></li>
                <li><a href="#" class="link-secondary">Постоянные экспозиции</a></li>
            </ul>
            <h5 style="color: white; margin-top: 50px">Наука в музее</h5>
            <ul class="list-unstyled text-small">
                <li><a href="#" class="link-secondary">Научные отделы</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5 style="color: white">Посетителям</h5>
            <ul class="list-unstyled text-small">
                <li><a href="#" class="link-secondary">Ответы на частые вопросы</a></li>
            </ul>
            <h5 style="color: white; margin-top: 50px">Билеты</h5>
            <ul class="list-unstyled text-small">
                <li><a href="#" class="link-secondary">Научные отделы</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5 style="color: white">Давай дружить</h5>
            <ul class="list-unstyled text-small">
                <li><a href="#" class="link-secondary">Ответы на частые вопросы</a></li>
            </ul>
        </div>
    </div>

</footer>
<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script>
    const myCarouselElement = document.querySelector('#carouselExampleIndicators')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
        wrap: false
    })
</script>
</body>

</html>