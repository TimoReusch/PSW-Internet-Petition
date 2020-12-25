<?php

/**
 * Database-Connection
 *
 * Connect to a mySQL-Database using PDO.
 *
 * PHP version 7
 *
 *
 * @package    main
 * @author     Timo Reusch <info@reusch-systems.de>
 */

$host = "your-database-domain";
$name = "your-database-name";
$user = "your-username";
$passwort = "your-password";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);

    //UTF-8 Zeichensatz für Werte aus der Datenbank
    $mysql->exec("set names utf8");
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
?>