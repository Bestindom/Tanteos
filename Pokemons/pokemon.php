<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once ('./php_partials/menu.php') ?>

    <div class="container">

        <?php
            
            if (isset($_SESSION['pokemon']))
            {
                $pokemon = $_SESSION['pokemon'];
                unset($_SESSION['pokemon']);
            }
            else
            {
                $pokemon = [
                    'id_pokemon' => '',
                    'name' => '',
                    'type' => ''
                ];
            }
        
        ?>

        <div class="card mt-2">
            <div class="card-header bg-secondary text-white">
                Pokemon
            </div>
            <div class="card-body">
                <form action="./php_controllers/pokemonController.php" method="POST" enctype="multipart/form-data">
                    <!-- Pokemon Identificator -->
                    <div class="form-group row p-2">
                        <label for="id_pokemon" class="col-sm 2 col-form-label">Identificator</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_pokemon" name="id_pokemon" placeholder="Pokemon #"
                            value="<?php echo $pokemon['id_pokemon']?>">
                        </div>
                    </div>

                    <!-- Pokemon Name -->
                    <div class="form-group row p-2">
                        <label for="name" class="col-sm 2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Pokemon Name"
                            value="<?php echo $pokemon['name']?>">
                        </div>
                    </div>

                    <!-- Pokemon Type -->
                    <div class="form-group row p-2">
                        <label for="type" class="col-sm 2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="type" aria-label="Default select example">
                                <option selected>Pokemon Type</option>
                                <option value="<?php echo $pokemon['type']?>">Normal</option>
                                <option value="<?php echo $pokemon['type']?>">Fire</option>
                                <option value="<?php echo $pokemon['type']?>">Water</option>
                                <option value="<?php echo $pokemon['type']?>">Grass</option>
                                <option value="<?php echo $pokemon['type']?>">Electric</option>
                                <option value="<?php echo $pokemon['type']?>">Ice</option>
                                <option value="<?php echo $pokemon['type']?>">Fighting</option>
                                <option value="<?php echo $pokemon['type']?>">Poison</option>
                                <option value="<?php echo $pokemon['type']?>">Ground</option>
                                <option value="<?php echo $pokemon['type']?>">Flying</option>
                                <option value="<?php echo $pokemon['type']?>">Psychic</option>
                                <option value="<?php echo $pokemon['type']?>">Bug</option>
                                <option value="<?php echo $pokemon['type']?>">Rock</option>
                                <option value="<?php echo $pokemon['type']?>">Ghost</option>
                                <option value="<?php echo $pokemon['type']?>">Dragon</option>
                                <option value="<?php echo $pokemon['type']?>">Dark</option>
                                <option value="<?php echo $pokemon['type']?>">Steel</option>
                                <option value="<?php echo $pokemon['type']?>">Fairy</option>
                            </select>
                        </div>
                    </div>

                    <!-- Pokemon Image -->
                    <div>
                        <div class="form-group row p-2">
                            <label for="image" class="col-sm 2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>

                    <!-- Form buttons -->
                    <div class="p-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary" name="insert">Accept</button>
                            <a href="./gallery.php" class="btn btn-secondary">Cancel</a>
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