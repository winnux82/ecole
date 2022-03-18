<?php

require_once('connect.php');

$supprimer= $_GET['supprimer'] ?? null;
if(isset($supprimer)){
    $query = $db-> query ('delete from etudiant where id='.$supprimer.'');
    header('location:index.php');
}
