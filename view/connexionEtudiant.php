<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Test de Hollande</title>
		<link rel="stylesheet" href="style.css" />


	</head>
	<body>
		<?php
			//Connexion à la bdd
			require("../model/connexionBD.php");
		?>
		<section>
			<form action="../controller/loginEtudiant.controller.php" method="post">
				<p>
					<em>Adresse universitaire : </em>
					<input type="text" name="email" placeholder="prenom.nom"/>
					<em>@etu.umontpellier.fr</em>
				</p>
				<p>
					<em>Mot de passe (initialement le même que la clefPromo) : </em>
					<input type="password" name="passwd" />
				</p>
				<p>
					<em>Clef de la promo : </em>
					<input type="text" name="clefPromo" />
				</p>
				<p>
					<input type="submit" value="Connexion" />
				</p>
			</form>
		</section>
		<?php
		/*include_once("../model/proposition.php");
		$propositions = getAllProposition();
		?>
		<div id="interim">
			<table class="table">
				<tr>
					<th>id</th>
					<th>description</th>
					<th>idGroup</th>
					<th>idFiche</th>
				</tr>
				<?php
					foreach ($propositions as $proposition)
					{
						?>
						<tr>
							<td><?php echo $proposition['id'];?></td>
							<td><?php echo $proposition['description']; ?> an(s)</td>
							<td><?php echo $proposition['idGroup'];?></td>
							<td><?php echo $proposition['idFiche']; ?> € par mois</td>
						</tr>
					<?php } */?>
				</table>
			</div>
	</body>
</html>
