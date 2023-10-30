<?php

session_start();

function openDb() {

    $servername = "localhost";
    $username = "root";
    $password = "mysql";

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

        $connection = closeDb();
    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = $e->getCode() . ' - ' . $e->getMessage();
    }
}



?>