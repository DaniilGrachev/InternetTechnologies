<?php
require_once 'textprocessing.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Образование в Швейцарии</title>
</head>
<body>

<?php
include ("header.php")
?>

<div class="main text-center py-5">
    <div class="container w-50">
        <form class="m-5" action="text.php" method="post">
            <label class="form-label">Введите текст</label>
            <textarea class="form-control" name="text"><?php if(isset($_POST['text'])) echo $_POST['text']?></textarea>
            <button class="btn btn-primary mt-2">Отправить</button>
        </form>

        <?php if(isset($_GET["preset"]) || isset($_POST["text"])){?>
            <div class="mt-3 text-start">
                <p class="h2">Задание 1</p>
                <div>
                    <?php $textProcessing->Task3()?>
                </div>
                <p class="h2">Задание 7 </p>
                <div>
                    <?php $textProcessing->Task7()?>
                </div>
                <p class="h2">Задание 12 </p>
                <div>
                    <?php $textProcessing->Task11()?>
                </div>
                <p class="h2">Задание 17 </p>
                <div>
                    <?php $textProcessing->Task17()?>
                </div>
            </div>
        <?php }?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>