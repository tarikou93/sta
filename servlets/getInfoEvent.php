<?php
session_start();

$idEvent = $_POST['idEvent'];

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gestion_sta;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->prepare('SELECT * FROM `evenement` WHERE `evenement`.`ID_EVE` = :ID_EVE ');

$reponse->execute(array(
	'ID_EVE' => $idEvent 
));

$data = $reponse->fetch();

$_SESSION['eventToModif'] = $data;

header('Location: ../modifEvent.php');
 ?>
