<?php

session_start();

function errorMessage($e)
    {
        if (!empty($e->errorInfo[1]))
        {
            switch ($e->errorInfo[1])
            {
                case 1062:
                    $message = 'Duplicated record';
                    break;
                case 1451:
                    $message = 'Record with related elements';
                    break;
                default:
                    $message = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                    break;
            }
        }
        else
        {
            switch ($e->getCode())
            {
                case 1044:
                    $message = "Incorrect user and/or password";
                    break;
                case 1049:
                    $message = "Unknow database";
                    break;
                case 2002:
                    $message = "Server not found";
                    break;
                default:
                    $message = $e->getCode() . ' - ' . $e->getMessage();
                    break;
            }
        }

        return $message;
    }

function openDb() {

    $servername = "localhost";
    $username = "root";
    $password = "root";

    $connection = new PDO("mysql:host=$servername;dbname=hoteles_dwes", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // to avoid problems with accent marks
    $connection->exec("set names utf8");

    return $connection;
}

function closeDb() {
    return null;
}

function selectCities() {

    $connection = openDb();

    $statementTxt = "select * from ciudades";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function insertCity($id_city, $name) {


    try 
    {
        $connection = openDb();

        $statementTxt = "insert into ciudades (id_ciudad, nombre) values (:id_ciudad, :nombre)";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_ciudad', $id_city);
        $statement->bindParam(':nombre', $name);
        $statement->execute();

        $_SESSION['message'] = 'Record inserted succesfully';

    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $city['id_city'] = $id_city;
        $city['name'] = $name;
        $_SESSION['city'] = $city;
    }

    $connection = closeDb();
}


?>