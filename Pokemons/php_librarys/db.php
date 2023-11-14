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
                        pokemon.num_pokedex as id_pokemon,
                        pokemon.name,
                        types.type,
                        regions.region,
                        pokemon.image
                    FROM
                        pokemon
                    JOIN
                        types ON pokemon.type = types.id_type
                    JOIN
                        regions ON pokemon.region = regions.id_region;
                    ";

    $statement = $connection->prepare($statementTxt);
    $statement->execute();

    // fetchAll return me an associative array (data table)
    $result = $statement->fetchAll();

    $connection = closeDb();

    return $result;
}

function insertPokemon($id_pokemon, $name, $image) {

    try 
    {
        $connection = openDb();

        $statementTxt = "insert into pokemon (id_pokemon, name , image) values (:id_pokemon, :name, :image)";
        $statement = $connection->prepare($statementTxt);
        $statement->bindParam(':id_pokemon', $id_pokemon);
        $statement->bindParam(':name', $name);
        //$statement->bindParam(':type', $type);
        $statement->bindParam(':image', $image);
        $statement->execute();

        $_SESSION['message'] = 'Record inserted succesfully';

    }
    catch (PDOException $e) 
    {
        $_SESSION['error'] = errorMessage($e);
        $pokemon['id_pokemon'] = $id_pokemon;
        $pokemon['name'] = $name;
        // $pokemon['type'] = $type;
        $pokemon['image'] = $image;
        //I saved this varible session to hold data that user inserted
        $_SESSION['pokemon'] = $pokemon;
    }

    $connection = closeDb();
}

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