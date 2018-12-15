<?php
  $date = $_POST['date'];
  $time = $_POST['heure'];
  $lieu = $_POST['lieu'];
  $objet = $_POST['objet'];
  $obs = $_POST['obs'];
  $ref = $_POST['ref'];



try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gestion_sta;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}





$req = $bdd->prepare('INSERT INTO `evenement` (`ID_EVE`, `REF`, `DATE_EVE`, `HEURE`, `LIEU`, `OBJET_EVE`, `OBSERV_EVE`, `ACHEV`)
VALUES(:ID_EVE, :REF, :DATE_EVE, :HEURE, :LIEU, :OBJET_EVE, :OBSERV_EVE, :ACHEV)');

$req->execute(array(
	'ID_EVE' => NULL,
	'REF' => $ref,
	'DATE_EVE' => $date,
	'HEURE' => $time,
	'LIEU' => $lieu,
	'OBJET_EVE' => $objet,
  'OBSERV_EVE' => $obs,
  'ACHEV' => 0
	));

echo 'L evenement a bien été ajouté !';

header('Location: ../addEvent.php');

//lecture
/*
$reponse = $bdd->query('SELECT * FROM evenement');

while ($donnees = $reponse->fetch()){
  echo $donnees['ID_EVE']. '<br>';
  echo $donnees['REF']. '<br>';
  echo $donnees['DATE_EVE']. '<br>';
  echo $donnees['HEURE']. '<br>';
  echo $donnees['LIEU']. '<br>';
  echo $donnees['OBJET_EVE']. '<br>';
  echo $donnees['OBSERV_EVE']. '<br>';
  echo $donnees['ACHEV']. '<br>';
}
*/

 ?>
