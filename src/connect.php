<?php

try {
    $dsn = 'mysql:host=localhost; dbname=hi-tech; charset=utf8';
    $link = new PDO($dsn, 'root', '');
} catch(PDOException $e) {
    echo 'Ошибка подключения к БД: ' . $e->getMessage();
}

?>