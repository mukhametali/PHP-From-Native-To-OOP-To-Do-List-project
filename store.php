<?php

$pdo = new PDO("mysql:host=localhost;dbname=test_db","root","mysql");
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
$statement = $pdo->prepare($sql);
$result = $statement ->execute($_POST);

header("Location: index.php"); exit;