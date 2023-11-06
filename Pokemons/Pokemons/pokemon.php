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

        <div class="card mt-2">
            <div class="card-header bg-secondary text-white">
                Pokemon
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <!-- Pokemon Identificator -->
                    <div class="form-group row p-2">
                        <label for="id_pokemon" class="col-sm 2 col-form-label">Identificator</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_pokemon" name="id_pokemon" placeholder="Pokemon #">
                        </div>
                    </div>

                    <!-- Pokemon Name -->
                    <div class="form-group row p-2">
                        <label for="name" class="col-sm 2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Pokemon Name">
                        </div>
                    </div>

                    <!-- Pokemon Type -->
                    <div class="form-group row p-2">
                        <label for="type" class="col-sm 2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Pokemon Type</option>
                                <option value="Normal">Normal</option>
                                <option value="Fire">Fire</option>
                                <option value="Water">Water</option>
                                <option value="Grass">Grass</option>
                                <option value="Electric">Electric</option>
                                <option value="Ice">Ice</option>
                                <option value="Fighting">Fighting</option>
                                <option value="Poison">Poison</option>
                                <option value="Ground">Ground</option>
                                <option value="Flying">Flying</option>
                                <option value="Psychic">Psychic</option>
                                <option value="Bug">Bug</option>
                                <option value="Rock">Rock</option>
                                <option value="Ghost">Ghost</option>
                                <option value="Dragon">Dragon</option>
                                <option value="Dark">Dark</option>
                                <option value="Steel">Steel</option>
                                <option value="Fairy">Fairy</option>
                            </select>
                        </div>
                    </div>

                    <!-- Form buttons -->
                    <div class="p-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary" name="insert">Accept</button>
                            <a href="./menu.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</body>
</html>