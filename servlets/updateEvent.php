<?php
$id = $_POST['idEvent'];
$ref = $_POST['ref'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$lieu = $_POST['lieu'];
$objet = $_POST['objet'];
$obs = $_POST['obs'];

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=gestion_sta;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('UPDATE `evenement` SET `REF`= :ref ,`DATE_EVE`= :d ,`HEURE`= :h ,`LIEU`= :l ,`OBJET_EVE`= :obj ,`OBSERV_EVE`= :obs
   WHERE `ID_EVE` = :id ');

   $req->execute(array(
   	'id' => $id,
   	'ref' => $ref,
   	'd' => $date,
   	'h' => $heure,
   	'l' => $lieu,
   	'obj' => $objet,
     'obs' => $obs
   	));

header('Location: ../listEvent.php');
 ?>
