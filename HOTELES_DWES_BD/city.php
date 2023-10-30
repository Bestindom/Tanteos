<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once ('./menu.php') ?>

    <div class="container">

        <?php require_once ('./php_partials/message.php') ?>


        <div class="card mt-2">
            <div class="card-header bg-secondary text-white">
                City
            </div>
            <div class="card-body">
                <form action="./php_controllers/cityController.php" method="POST">
                    <!-- City Identificator -->
                    <div class="form-group row p-2">
                        <label for="id_city" class="col-sm 2 col-form-label">Identificator</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_city" name="id_city" placeholder="City Identificator">
                        </div>
                    </div>

                    <!-- City Name -->
                    <div class="form-group row p-2">
                        <label for="name" class="col-sm 2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="City Name">
                        </div>
                    </div>

                    <!-- Form buttons -->
                    <div class="p-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary" name="insert">Accept</button>
                            <a href="./cities.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>