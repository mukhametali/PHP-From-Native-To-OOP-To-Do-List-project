<?php

$data = [
    "id"        => $_GET['id'],
    "title"     => $_POST['title'],
    "content"   => $_POST['content']
];

$pdo = new PDO("mysql:host=localhost; dbname=test_db","root","mysql");
$sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
$statement = $pdo->prepare($sql);
$result = $statement->execute($data);

header("Location: index.php");