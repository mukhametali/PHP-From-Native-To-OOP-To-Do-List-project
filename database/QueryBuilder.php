<?php

class QueryBuilder
{
    // Список задач
    function getAllTasks ()
    {
        // 1. Подключаем к БД
        $pdo = new PDO("mysql:host=localhost; dbname=test_db","root","mysql");

        //2. Подготовить запрос
        $sql = "SELECT * FROM tasks";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }

    // Сохранение новой задачи
    function addTask ($data)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test_db","root","mysql");
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
        $statement = $pdo->prepare($sql);
        $result = $statement ->execute($data);// true || false
        //null
    }

    // Вывод одной задачи
    function getTask ($id)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test_db","root","mysql");
        $sql = "SELECT * FROM tasks WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);

        return $task;
    }

    // Изменения\обновления существующей задачи
    function updateTask ($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test_db","root","mysql");
        $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $result = $statement->execute($data);
    }

    // Удаления задачи
    function deleteTask ($id)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test_db","root","mysql");
        $sql = "DELETE FROM tasks WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement ->bindParam(":id",$id);
        $statement ->execute();
    }

}

