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

    $statementTxt = "SELECT
                        p.id_pokemon,
                        p.num_pokedex,
                        p.name,
                        r.region,
                        p.image,
                        t.name_type AS type
                    FROM
                        pokemon p
                    JOIN
                        regions r ON p.region = r.id_region
                    JOIN
                        pokemon_type pt ON p.id_pokemon = pt.id_pokemon
                    JOIN
                        types t ON pt.id_type = t.id_type
                    ";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function insertPokemon($num_pokedex, $name, $region, $image) {

    try 
    {
        $connection = openDb();

        $statementTxt = "insert into pokemon (num_pokedex, name , region, image) values (:num_pokedex, :name, :region, :image);";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':num_pokedex', $num_pokedex);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':region', $region);
        $statement->bindParam(':image', $image);
        $statement->execute();

        $_SESSION['message'] = 'Record inserted succesfully';

        return $connection->lastInsertId();
    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $pokemon['num_pokedex'] = $num_pokedex;
        $pokemon['name'] = $name;
        $pokemon['region'] = $region;
        $pokemon['image'] = $image;
        //I saved this varible session to hold data that user inserted
        $_SESSION['pokemon'] = $pokemon;
    }

    $connection = closeDb();
}

function insertPokemon_type ($id_pokemon, $id_type) {
    try
    {
        $connection = openDb();

        $statementTxt = "INSERT INTO pokemon_type (id_pokemon, id_type) values (:id_pokemon, :id_type)";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_pokemon', $id_pokemon);
        $statement->bindParam(':id_type', $id_type);
        $statement->execute();
    }
    catch (PDOException $e)
    {
        $_SESSION['error'] = errorMessage($e);
    }

    $connection = closeDb();
};


function deletePokemon ($id_pokemon) {

    try 
    {
        $connection = openDb();

        $statementTxt = "delete from pokemon where (id_pokemon = :id_pokemon)";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_pokemon', $id_pokemon);
        $statement->execute();

        $_SESSION['message'] = 'Delete succesfully';

    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $pokemon['id_pokemon'] = $id_pokemon;
        //I saved this varible session to hold data that user inserted
        $_SESSION['pokemon'] = $pokemon;
    }

    $connection = closeDb();
}

?>