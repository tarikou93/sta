<?php
session_start();

if (!isset($_SESSION['user'])){

	header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">


				<!-- Responsive tables Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue">Liste des évènements</h4>
							<p>achevés</p>
						</div>

					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th >Ref</th>
									<th >Date</th>
									<th >Heure</th>
									<th >Lieu</th>
									<th >Objet</th>
									<th>Observation</th>

								</tr>
							</thead>
							<tbody>

								<?php
								try
								{
									$bdd = new PDO('mysql:host=localhost;dbname=gestion_sta;charset=utf8', 'root', '');
								}
								catch(Exception $e)
								{
								        die('Erreur : '.$e->getMessage());
								}

								$reponse = $bdd->query('SELECT * FROM `evenement` WHERE ACHEV = 1 ORDER BY `evenement`.`DATE_EVE` ASC');

								while ($donnees = $reponse->fetch()){
									echo '<tr>';
									echo '<td>'. $donnees['REF']. '</td>';
									echo '<td>'. $donnees['DATE_EVE']. '</td>';
									echo '<td>'. $donnees['HEURE']. '</td>';
									echo '<td>'. $donnees['LIEU']. '</td>';
									echo '<td>'. $donnees['OBJET_EVE']. '</td>';
									echo '<td>'. $donnees['OBSERV_EVE']. '</td>';

									echo '</tr>';
								}
								 ?>



							</tbody>
						</table>
					</div>

				</div>
				<!-- Responsive tables End -->

			</div>

		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>
