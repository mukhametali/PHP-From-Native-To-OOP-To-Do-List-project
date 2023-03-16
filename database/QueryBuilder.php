<?php

class QueryBuilder
{
    public $pdo;

    public function __construct()
    {
        // 1. Подключаем к БД
        $this->pdo = new PDO("mysql:host=localhost; dbname=test_db","root","mysql");

    }

    // Список задач
    function all ($table)
    {
        //2. Подготовить запрос
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    // Вывод одной задачи
    function getOne ($table,$id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Сохранение новой задачи
    function store ($table,$data)
    {
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Сформировать строку title, content
        $stringOfKeys = implode(',', $keys);
        // 3. Сформировать метки
        $placeholders = ":" . implode(', :', $keys);

        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement ->execute($data);
    }

    // Изменения\обновления существующей задачи
    function update ($table,$data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields,",");


        $sql = "UPDATE $table SET $fields WHERE id=:id";

        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($data);
    }

    // Удаления задачи
    function delete ($table,$id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement ->bindParam(":id",$id);
        $statement ->execute();
    }

}

