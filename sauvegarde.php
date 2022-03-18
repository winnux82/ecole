<?php


require_once('connect.php');
$id =  $_POST['id'] ?? null;
$eleve = $_POST;



//on ajoute dans la base de données
if(!isset($_POST['nom']) or empty($_POST['nom'])) {
    echo 'Le nom est obligatoire';
    echo '<a href="index.php">Retour à l\'index</a>';
}elseif(!isset($_POST['prenom']) or empty($_POST['prenom'])) {
    echo 'Le prénom est obligatoire';
    echo '<a href="index.php">Retour à l\'index</a>';
}

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
if($id !=null) {
    $resultat = $db->query("update etudiant set nom='$nom',prenom='$prenom',adresse='$adresse' where id=$id")or die (print_r($db->errorInfo()));

}else{
   $resultat = $db-> query ('insert into etudiant (nom,prenom,adresse) values ("'.$nom.'","'.$prenom.'","'.$adresse.'")')or die (print_r($db->errorInfo()));
}


return header('location:index.php');