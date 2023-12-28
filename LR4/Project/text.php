<?php
require_once "boot.php";
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

</head>

<body>

<main>
    <?php require_once "text_logic.php";
    /** @var $text1 string */
    /** @var $text2 string */
    /** @var $text3 string */
    /** @var $text4 string */
    /** @var $text0 string */
    mb_internal_encoding("UTF-8");
    ?>
    <form method="POST">
        <div class="centered">
            <h1>Текст для 4 лабораторной работы</h1>
            <h5><b>Текст</b></h5>
            <textarea name="text" cols="70" rows="10"></textarea>
            <br>
            <input type="submit" name="submit" value="Отправить" style="margin:30px 0 30px 0">
            <a href="back.php" style="color: #74b1ff; font-weight: bold; text-decoration: none">На главную</a>
            <br>
            Выбрать пресет:
            <input type="submit" name="preset" value="1">
            <input type="submit" name="preset" value="2">
            <input type="submit" name="preset" value="3">
            <input type="submit" name="preset" value="4">
            <h2>Результаты заданий:</h2>
            <?php if ($text0): ?>
                Задание 0: <br>
                <p style="text-align: left">
                    <?= $text0; ?> <br><br>
                </p>
            <?php endif; ?>
            <?php if ($text1): ?>
                Задание 1: <br>
                <p style="text-align: left">
                    <?= $text1; ?> <br><br>
                </p>
            <?php endif; ?>
            <?php if ($text2): ?>
                Задание 2: <br>
                <p style="text-align: left">
                    <?= $text2; ?> <br><br>
                </p>
            <?php endif; ?>
            <?php if ($text3): ?>
                Задание 3: <br>
                <p>
                    <?= $text3; ?> <br><br>
                </p>
            <?php endif; ?>
            <?php if ($text4): ?>
                Задание 4: <br>
                <p>
                    <?= $text4; ?> <br><br>
                </p>
            <?php endif; ?>
        </div>
    </form>
</main>


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
<script src="js/grachev_scripts.js"></script>
</body>

</html>