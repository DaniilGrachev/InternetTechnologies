<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = 'SELECT p.img_path, p.name, p.description, h.name, p.year FROM paintings as p join halls as h on p.id_hall = h.id';

$variables = ['name' => 'p.name', 'img' => 'p.img_path', 'description' => 'p.description', 'hall_name' => 'h.name', 'year' => 'p.year'];
$variablesRus = ['name' => 'Художник', 'description' => 'Название картины', 'hall_name' => 'Зал', 'year'=>'Дата'];
$filtered = array_filter($_GET);

$intersect = array_intersect_key($filtered, $variables);

if ($intersect) {
    $query .= ' WHERE ';

    $query .= join(' AND ', array_map((fn($k, $v): string => $variables[$k] . ' = \'' . $v . '\''), array_keys($intersect), $intersect));

}

$result = $conn->query($query)->fetch_all();
