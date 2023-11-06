<?php

session_start();

function openDb() {

    $servername = "localhost";
    $username = "root";
    $password = "mysql";

    $connection = new PDO("mysql:host=$servername;dbname=pokemons", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // to avoid problems with accent marks
    $connection->exec("set names utf8");

    return $connection;
}

function closeDb() {
    return null;
}

function selectPokemons() {

    $connection = openDb();

    $statementTxt = "select * from pokemon";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function insertPokemon($id_pokemon, $name) {


    try 
    {
        $connection = openDb();

        $statementTxt = "insert into ciudades (id_pokemon, name) values (:id_pokemon, :name)";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_pokemon', $id_pokemon);
        $statement->bindParam(':name', $name);
        $statement->execute();

        $_SESSION['message'] = 'Record inserted succesfully';

    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $city['id_city'] = $id_pokemon;
        $city['name'] = $name;
        $_SESSION['city'] = $city;
    }

    $connection = closeDb();
}

function deletePokemon ($id_city) {


    try 
    {
        $connection = openDb();

        $statementTxt = "delete from ciudades where (id_ciudad = :id_city)";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_city', $id_city);
        $statement->execute();

        $_SESSION['message'] = 'Delete succesfully';

    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $city['id_city'] = $id_city;
        $_SESSION['city'] = $city;
    }

    $connection = closeDb();
}

?>