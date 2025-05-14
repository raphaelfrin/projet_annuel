<?php
/*
Change the value of $password if you have set a password on the root userid
Change NULL to port number to use DBMS other than the default using port 3306
*/
$servername = '127.0.0.1';
$user = 'root';
$password = ''; //To be completed if you have set a password to root
$database = 'projet_annuel'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
//Utlisation de MySQLI proédural
try{
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $user, $password);
    // Définir le mode d'erreur PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    /*On capture les exceptions si une exception est lancée et on affiche
    les informations relatives à celle-ci*/
    catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }
    
?>