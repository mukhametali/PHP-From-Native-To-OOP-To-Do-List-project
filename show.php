<?php
$pdo = new PDO("mysql:host=localhost; dbname=test_db","root","mysql");
$sql = "SELECT * FROM tasks WHERE id=:id ";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id",$_GET['id']);
$result = $statement;
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);


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

            <h1><?=$task['title']?></h1>

            <p>
                <?=$task['content']?>
            </p>

            <a href="index.php" class="btn btn-dark">Go back</a>
        </div>
    </div>
</div>
</body>
</html>