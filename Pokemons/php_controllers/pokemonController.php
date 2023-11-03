<?php
    session_start();

    require_once('../php_librarys/db.php');

    if (isset($_POST['insert'])) {
        
        insertPokemon($_POST['id_pokemon'], $_POST['name'], $_POST['type']);

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
?>