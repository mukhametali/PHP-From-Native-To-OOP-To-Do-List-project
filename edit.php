<?php

require "database/QueryBuilder.php";

$db = new QueryBuilder;

$id = $_GET['id'];

$task = $db->getOne("tasks",$id);

?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Task</h1>
            <form action="update.php?id=<?= $task['id'];?>" method="post">
                <div class="form-group">
                    <input name="title" type="text" class="form-control" value="<?=$task['title']?>">
                </div>

                <div class="form-group" style="margin-top: 10px">
                    <textarea name="content" class="form-control"><?=$task['content']?></textarea>
                </div>

                <div class="form-group" style="margin-top: 10px">
                    <button class="btn btn-warning" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>