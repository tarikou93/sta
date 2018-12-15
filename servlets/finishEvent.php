<?php
$idEventToFinish = $_POST['idEvent'];

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gestion_sta;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('UPDATE `evenement` SET `ACHEV` = 1 WHERE `evenement`.`ID_EVE` = :ID_EVE');

$req->execute(array(
	'ID_EVE' => $idEventToFinish
	));

  header('Location: ../listEvent.php');
 ?>
