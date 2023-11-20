<?php
    require_once('./php_librarys/db.php');

    $regions = selectRegions();
?>
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
        <?php require_once ('./php_partials/message.php'); ?>

        <?php
            
            if (isset($_SESSION['pokemon']))
            {
                $pokemon = $_SESSION['pokemon'];
                unset($_SESSION['pokemon']);
            }
            else
            {
                $pokemon = [
                    'num_pokedex' => '',
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
                        <label for="num_pokedex" class="col-sm 2 col-form-label">Identificator</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="num_pokedex" name="num_pokedex" placeholder="Pokemon #"
                            value="<?php echo $pokemon['num_pokedex']?>">
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

                    <!-- Pokemon Region -->
                    <div class="form-group row p-2">
                        <label for="name" class="col-sm 2 col-form-label">Region</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="region" name="region" aria-label="Default select example">
                                <option value="" selected>Region</option>
                                <?php foreach ($regions as $region) { ?>
                                    <option value="<?php echo $region['id_region']; ?>"><?php echo $region['region']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <!-- Pokemon Type -->
                    <div class="form-group row p-2">
                        <label for="type" class="col-sm 2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <div>
                                    <input type="checkbox" class="btn-check" id="Normal" name="types[]" autocomplete="off" value="1">
                                    <label class="btn btn-outline-primary" for="Normal">Normal</label>

                                    <input type="checkbox" class="btn-check" id="Fire" name="types[]" autocomplete="off" value="2">
                                    <label class="btn btn-outline-primary" for="Fire">Fire</label>

                                    <input type="checkbox" class="btn-check" id="Water" name="types[]" autocomplete="off" value="3">
                                    <label class="btn btn-outline-primary" for="Water">Water</label>

                                    <input type="checkbox" class="btn-check" id="Grass" name="types[]" autocomplete="off" value="4">
                                    <label class="btn btn-outline-primary" for="Grass">Grass</label>

                                    <input type="checkbox" class="btn-check" id="Electric" name="types[]" autocomplete="off" value="5">
                                    <label class="btn btn-outline-primary" for="Electric">Electric</label>

                                    <input type="checkbox" class="btn-check" id="Ice" name="types[]" autocomplete="off" value="6">
                                    <label class="btn btn-outline-primary" for="Ice">Ice</label>

                                    <input type="checkbox" class="btn-check" id="Fighting" name="types[]" autocomplete="off" value="7">
                                    <label class="btn btn-outline-primary" for="Fighting">Fighting</label>

                                    <input type="checkbox" class="btn-check" id="Poison" name="types[]" autocomplete="off" value="8">
                                    <label class="btn btn-outline-primary" for="Poison">Poison</label>

                                    <input type="checkbox" class="btn-check" id="Ground" name="types[]" autocomplete="off" value="9">
                                    <label class="btn btn-outline-primary" for="Ground">Ground</label>

                                    <input type="checkbox" class="btn-check" id="Flying" name="types[]" autocomplete="off" value="10">
                                    <label class="btn btn-outline-primary" for="Flying">Flying</label>

                                    <input type="checkbox" class="btn-check" id="Psychic" name="types[]" autocomplete="off" value="11">
                                    <label class="btn btn-outline-primary" for="Psychic">Psychic</label>

                                    <input type="checkbox" class="btn-check" id="Bug" name="types[]" autocomplete="off" value="12">
                                    <label class="btn btn-outline-primary" for="Bug">Bug</label>

                                    <input type="checkbox" class="btn-check" id="Rock" name="types[]" autocomplete="off" value="13">
                                    <label class="btn btn-outline-primary" for="Rock">Rock</label>

                                    <input type="checkbox" class="btn-check" id="Ghost" name="types[]" autocomplete="off" value="14">
                                    <label class="btn btn-outline-primary" for="Ghost">Ghost</label>

                                    <input type="checkbox" class="btn-check" id="Dragon" name="types[]" autocomplete="off" value="15">
                                    <label class="btn btn-outline-primary" for="Dragon">Dragon</label>

                                    <input type="checkbox" class="btn-check" id="Dark" name="types[]" autocomplete="off" value="16">
                                    <label class="btn btn-outline-primary" for="Dark">Dark</label>

                                    <input type="checkbox" class="btn-check" id="Steel" name="types[]" autocomplete="off" value="17">
                                    <label class="btn btn-outline-primary" for="Steel">Steel</label>

                                    <input type="checkbox" class="btn-check" id="Fairy" name="types[]" autocomplete="off" value="18">
                                    <label class="btn btn-outline-primary" for="Fairy">Fairy</label>
                                </div>
                            </div>
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

    
</body>
</html>