<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Task</h1>
                <form action="store.php" method="post">
                    <div class="form-group">
                        <input name="title" type="text" class="form-control">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <textarea name="content" class="form-control"></textarea>
                    </div>

                     <div class="form-group" style="margin-top: 10px">
                         <button class="btn btn-success" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>