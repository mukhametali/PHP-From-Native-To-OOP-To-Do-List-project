<?php

require "database/QueryBuilder.php";

$db = new QueryBuilder;

$tasks = $db->getAllTasks();



?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>All Tasks</h1>
                <a href="create.php" class="btn btn-success">Add Task</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tasks as $task): ?>
                    <tr>
                            <td><?=$task['id']?></td>
                            <td><?=$task['title']?></td>
                            <td>
                                <a href="show.php?id=<?=$task['id'];?>" class="btn btn-info">Show</a>
                                <a href="edit.php?id=<?=$task['id'];?>" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?=$task['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                    </tr>
                    <? endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>