<?php
    session_start();

    require_once('../php_librarys/db.php');

    if (isset($_POST['insert']))
    {

         $temporalName = $_FILES['image']['tmp_name'];
         $imgName = $_POST['id_pokemon'] . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

         // Especifica la carpeta de destino en el servidor
         $path = '../images/' . $imgName;

        if( move_uploaded_file($temporalName, $path))
        {
            echo 'Se ha movido a ' . $path;
            insertPokemon($_POST['id_pokemon'], $_POST['name'], './images/' . $imgName);    

            if (isset($_SESSION['error']))
            {
                header('Location: ../pokemon.php');
                exit();
            }
            else
            {
                header('Location: ../gallery.php');
                exit();
            }
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