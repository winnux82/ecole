<?php

$user= 'eleve';
$pass= 'eleve';

try {
    $db = new PDO('mysql:host=localhost;port=3307;dbname=ecole_db', $user, $pass);
    //echo 'ça marche';
} catch (PDOException $e) {
    //echo 'Le site est en maintenance, erreur bdd';
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}