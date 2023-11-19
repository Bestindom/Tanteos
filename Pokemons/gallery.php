<?php
    require_once('./php_librarys/db.php');

    $pokemons = selectPokemons();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/445608dbda.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once ('./php_partials/menu.php') ?>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        <?php foreach ($pokemons as $pokemon) { ?>
        
            <div class="col">
                <div class="card h-100">
                <img src="<?php echo $pokemon['image']; ?>" class="card-img-top" alt="dead pokemon" value="<?php $pokemon['id_pokemon']; ?>">
                    <div class="card-body in-line">
                        <input type="hidden" name="id_pokemon" value="<?php echo $pokemon['id_pokemon']?>">
                        <h5 class="card-title"><?php echo $pokemon['num_pokedex']; ?></h5>
                        <h5 class="card-title"><?php echo $pokemon['name']; ?></h5>
                        <h5 class="card-title"><?php echo $pokemon['type']; ?></h5>
                        <h5 class="card-title"><?php echo $pokemon['region']; ?></h5>
                    </div>

                    <form action="./php_controllers/pokemonController.php" method="POST">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-warning">
                                <i class="fa-solid fa-pen-to-square fa-xl"></i>
                            </button>
                            <!-- <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal"  data-bs-target="#staticBackdrop" name="openModal">
                                <input type="hidden" name="id_pokemon" value="<?php echo $pokemon['id_pokemon']?>">
                                <?php echo $pokemon['id_pokemon']?>
                                <?php $idCard = $pokemon['id_pokemon']?>
                                <i class="fa-solid fa-trash-can fa-xl"></i>
                            </button> -->
                            <button type="submit" class="btn btn-outline-danger" name="delete">
                                <?php echo $pokemon['id_pokemon']?>
                                <input type="hidden" name="id_pokemon" value="<?php echo $pokemon['id_pokemon']?>">
                                <i class="fa-solid fa-trash-can fa-xl"></i>
                            </button>
                        </div>


                        <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Pokemon</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete this Pokemon?
                                    </div>
                                    <form action="./php_controllers/pokemonController.php" method="POST">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-danger" name="delete">
                                                <input type="hidden" name="id_pokemon" value="<?php echo $idCard?>">
                                                <?php echo $idCard?>
                                                <i class="fa-solid fa-trash-can fa-xl"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>



</body>
</html>
