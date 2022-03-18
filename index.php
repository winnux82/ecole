<?php
// connexion à la base
require_once('connect.php');
$req=$db->query ('select * from etudiant')or die;
$eleve = $_POST;


$modifier= $_GET['modifier'] ?? null;
if(isset($modifier)){

    $query = $db->query('select * from etudiant where id=' . $modifier);
    $datamodif = $query->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logiciel Ecole</title>
</head>
<body>
<H2>Logiciel Ecole</H2>
<form action="sauvegarde.php<?= $url ?>" method="POST">
    <fieldset>
    <?php if($modifier===null) : ?>
        <legend>Ajout</legend>
    <?php else : ?>
        <legend>Modifier</legend>
    <?php endif ?>
            <input type="hidden" name="id" value="<?= $datamodif['id'] ?? '' ?>"><br>
            <label>Nom : </label> <input type="text" name="nom" value="<?= $datamodif['nom'] ?? '' ?>"><br>
            <label>Prenom : </label> <input type="text" name="prenom" value="<?= $datamodif['prenom'] ?? '' ?>"><br>
            <label>Adresse : </label> <input type="text" name="adresse" value="<?= $datamodif['adresse'] ?? '' ?>"><br>
            <input type="submit" value="Enregistrer">

        </fieldset>
    </form>

    <a onclick="return confirm('Voulez vous vraiment supprimer tous les éléments?')" href="?reset"><button class="btn btn-primary">Vider la table</button></a>
      <?php
      if (isset($_GET['reset'])) {
          $db-> query ('DELETE FROM etudiant');
          header('location:index.php');
      }
      ?>

<?php

// on affiche le tableau
echo '<table border="1" >';

echo '<tr>
<td>ID</td>
<td>Nom</td>
<td>Prenom</td>
<td>Adresse</td>
<td>Modifier</td>
<td>Supprimer</td></tr>' ;

while ($donnees=$req->fetch () )
{
	echo '<td>' .$donnees['id'].'</td>' ;
	echo '<td>' .$donnees['nom'].'</td>' ;
	echo '<td>' .$donnees['prenom'].'</td>' ;
	echo '<td>' .$donnees['adresse'].'</td>' ;
    echo '<td><a href="index.php?modifier=' . $donnees['id'] . '">Modifier</a></td>';
    echo '<td><a href="supprimer.php?supprimer=' . $donnees['id'] . '" >Supprimer</a></td></tr>';

}

echo '</table>'; 
?>
</body>
</html>