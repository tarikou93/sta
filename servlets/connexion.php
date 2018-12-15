<?php
session_start();

$name =  $_POST['Username'];
$pwd = $_POST['password'];

if($name == "tarek" && $pwd =="0000"){
  $_SESSION['user'] = $_POST['Username'];



  try
  {
  	$bdd = new PDO('mysql:host=localhost;dbname=gestion_sta;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }

  $reponse = $bdd->query('SELECT * FROM `evenement` WHERE (DATEDIFF(DATE_EVE, CURRENT_DATE())) < 2 and (DATEDIFF(DATE_EVE, CURRENT_DATE())) >= 0 and ACHEV = 0 ORDER BY `evenement`.`DATE_EVE` ASC');
  $count = 0;
  while ($donnees = $reponse->fetch()){
    $count ++;
  }

  $_SESSION['notif'] = $count;
  //header('Location: ../test.php');
  header('Location: ../home.php');
}

else{
  header('Location: ../403.php');
}

?>
