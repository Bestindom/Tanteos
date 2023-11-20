<?php
    require_once('./php_librarys/db.php');

    $regions = selectRegions();

    $types = selectTypes();
    
    $pokemon = selectPokemonsById($_POST['id_pokemon']);
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
                            value="<?php echo $_POST['num_pokedex']?>">
                        </div>
                    </div>

                    <!-- Pokemon Name -->
                    <div class="form-group row p-2">
                        <label for="name" class="col-sm 2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Pokemon Name"
                            value="<?php echo $_POST['name']?>">
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

                                    <?php if ($_POST['region'] == $region['region']) {?>
                                            <option value="<?php echo $region['id_region']; ?>" selected><?php echo $region['region']; ?></option>
                                    <?php } ?>
                                    
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
                                    <?php foreach ($types as $type) { ?>
                                        <input type="checkbox" class="btn-check" id="type" name="types[]" autocomplete="off" value="<?php echo $type['id_type']; ?>">
                                        <label class="btn btn-outline-primary" for="type"><?php echo $type['name_type']; ?></label>

                                        <?php if ($_POST['type'] == $type['name_type']) {?>
                                            <input type="checkbox" class="btn-check" id="type" name="types[]" checked value="<?php echo $type['id_type']; ?>">
                                            <label class="btn btn-outline-primary" for="type"><?php echo $type['name_type']; ?></label>
                                        <?php } ?>
                                    <?php } ?>
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