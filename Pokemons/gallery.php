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
    <title>Document</title>
</head>
<body>
    <?php include_once ('./menu.php') ?>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        <?php foreach ($pokemons as $pokemon) { ?>
            <div class="col">
                <div class="card h-100">
                <img src="<?php echo $pokemon['image']; ?>" class="card-img-top" alt="dead pokemon" value="<?php $pokemon['id_pokemon']; ?>">
                    <div class="card-body in-line">
                        <h5 class="card-title"><?php echo $pokemon['name']; ?></h5>
                        <h5 class="card-title"><?php echo $pokemon['type']; ?></h5>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-outline-warning">
                            <i class="fa-solid fa-pen-to-square fa-xl"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger">
                            <a href="./deletePokemon.php"><i class="fa-solid fa-trash-can fa-xl"></i></a>
                        </button>
                    </div>
                </div>
            </div>     
        <?php } ?>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>