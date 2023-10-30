<?php
    require_once('./php_librarys/db.php');

    $cities = selectCities();
?>


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
        <div class="float-right">
            <a href="./city.php" class="btn btn-primary">New City</a>
        </div>
        <div class="card mt-2">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>

                <?php foreach ($cities as $city) { ?>
                    <tr>
                        <!-- Esto tiene que estar igual que BD -->
                        <td><?php echo $city['id_ciudad']; ?></td>
                        <td><?php echo $city['nombre']; ?></td>
                    </tr>

                <?php } ?>
                
            </table>
        </div>
    </div>

    
</body>
</html>