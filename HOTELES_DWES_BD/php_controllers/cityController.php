<?php
    session_start();

    require_once('../php_librarys/db.php');

    if (isset($_POST['insert'])) {
        
        insertCity($_POST['id_city'], $_POST['name']);

        if (isset($_SESSION['error']))
        {
            header('Location: ../city.php');
            exit();
        }
        else
        {
            header('Location: ../cities.php');
            exit();
        }
    }
?>