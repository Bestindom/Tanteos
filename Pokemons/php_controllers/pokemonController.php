<?php
    session_start();

    require_once('../php_librarys/db.php');

    if (isset($_POST['insert']))
    {

         $temporalName = $_FILES['image']['tmp_name'];
         $imgName = $_POST['num_pokedex'] . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

         // Especifica la carpeta de destino en el servidor
         $path = '../images/' . $imgName;

        if( move_uploaded_file($temporalName, $path))
        {
            echo 'Se ha movido a ' . $path;
            $id_pokemon = insertPokemon($_POST['num_pokedex'], $_POST['name'], $_POST['region'], './images/' . $imgName);

            // Im verify if array types exists and is it an array
            if(isset($_POST['types']) && is_array($_POST['types']))
            {
                //if types array is empty, 
                if(empty(($_POST['types']))) {
                    $_SESSION['error'];
                }
                else
                {
                    foreach($_POST['types'] as $id_type)
                    {
                        insertPokemon_type($id_pokemon, $id_type);
                    }
                }
            };


            if (isset($_SESSION['error']))
            {
                header('Location: ../pokemon.php');
                exit();
            }
            else
            {
                header('Location: ../gallery.php');
                exit();
            };
        }
    }

    if (isset($_POST['delete'])) {
        
        deletePokemon($_POST['id_pokemon']);

        if (isset($_SESSION['error']))
        {
            header('Location: ../gallery.php');
            exit();
        }
        else
        {
            header('Location: ../gallery.php');
            exit();
        }
    }

?>