<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Questionnaire</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		<link rel="stylesheet" href="../Formulaire/Formulaire.css">
		<script type="text/javascript" src="../Formulaire/Formulaire2.js"></script>
	</head>

	<body>
		<div class="table-title">
			<h3>Test RIASEC</h3>
		</div>
		<?php
		// Si i est inférieur à 12 on continue le questionnaire et on sauvegarde dans un coin les réponses.
		if ($i<12){
			?>
    <form method="post" action="formulaire.controller.php" class="form" onsubmit="return suivant();">
			<?php
			}
			// Sinon on envoie les données au controller de résultat
			else{
				?>
				<form method="post" action="resultat.controller.php" class="form" onsubmit="return suivant();">
					<?php
			}
				?>
				
  		<table class="table-fill">
  			<thead>
  				<tr>
  					<th class="text-left"></th>
  					<th class="text-left"><center><strong>Groupe <?php echo $i ?></strong></center></th>
  					<th class="text-left">1</th>
  					<th class="text-left">2</th>
  					<th class="text-left">3</th>
  				</tr>
  			</thead>
  			<tbody class="table-hover">
  				<tr>
  					<th class="text-left">A</td>
  					<td class="text-left"><?php echo $propositions[0]['description'] ?></td>
  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[0]['id']?>" onclick="remove1('a',<?php echo $propositions[0]['id']?>)" id="a1"/> </td> <!-- remplacer le 'R',le numéro du groupe et la proposition par la base de données -->
  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[0]['id']?>" onclick="remove2('a',<?php echo $propositions[0]['id']?>)" id="a2"/> </td>
  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[0]['id']?>" onclick="remove3('a',<?php echo $propositions[0]['id']?>)" id="a3"/> </td>
  				</tr>

  				<tr>
  					<th class="text-left">B</td>
  					<td class="text-left"><?php echo $propositions[1]['description'] ?></td>
  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[1]['id']?>" onclick="remove1('b',<?php echo $propositions[1]['id']?>)" id="b1"/> </td>
  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[1]['id']?>" onclick="remove2('b',<?php echo $propositions[1]['id']?>)" id="b2"/> </td>
  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[1]['id']?>" onclick="remove3('b',<?php echo $propositions[1]['id']?>)" id="b3"/> </td>
  				</tr>
  				<tr>
  					<th class="text-left">C</td>
  					<td class="text-left"><?php echo $propositions[2]['description'] ?></td>
  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[2]['id']?>" onclick="remove1('c',<?php echo $propositions[2]['id']?>)" id="c1"/> </td>
  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[2]['id']?>" onclick="remove2('c',<?php echo $propositions[2]['id']?>)" id="c2"/> </td>
  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[2]['id']?>" onclick="remove3('c',<?php echo $propositions[2]['id']?>)" id="c3"/> </td>
  				</tr>
  				<tr>
  					<th class="text-left">D</td>
  					<td class="text-left"><?php echo $propositions[3]['description'] ?></td>
  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[3]['id']?>" onclick="remove1('d',<?php echo $propositions[3]['id']?>)" id="d1"/> </td>
  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[3]['id']?>" onclick="remove2('d',<?php echo $propositions[3]['id']?>)" id="d2"/> </td>
  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[3]['id']?>" onclick="remove3('d',<?php echo $propositions[3]['id']?>)" id="d3"/> </td>
  				</tr>
  				<tr>
  					<th class="text-left">E</td>
  					<td class="text-left"><?php echo $propositions[4]['description'] ?></td>
  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[4]['id']?>" onclick="remove1('e',<?php echo $propositions[4]['id']?>)" id="e1"/> </td>
  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[4]['id']?>" onclick="remove2('e',<?php echo $propositions[4]['id']?>)" id="e2"/> </td>
  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[4]['id']?>" onclick="remove3('e',<?php echo $propositions[4]['id']?>)" id="e3"/> </td>
  				</tr>
  				<tr>
  					<th class="text-left">F</td>
  					<td class="text-left"><?php echo $propositions[5]['description'] ?></td>
  					<td> <input type="radio" name="rep1" value="<?php echo $propositions[5]['id']?>" onclick="remove1('f',<?php echo $propositions[5]['id']?>)" id="f1"/> </td>
  					<td> <input type="radio" name="rep2" value="<?php echo $propositions[5]['id']?>" onclick="remove2('f',<?php echo $propositions[5]['id']?>)" id="f2"/> </td>
  					<td> <input type="radio" name="rep3" value="<?php echo $propositions[5]['id']?>" onclick="remove3('f',<?php echo $propositions[5]['id']?>)" id="f3"/> </td>
  				</tr>
  			</tbody>
  		</table>

			<input type="hidden" value="<?php echo $i+1?>" name="numGroupe" />
			<input type="hidden" value="<?php echo implode(",",$choix1) ?>" name="choix1" />
			<input type="hidden" value="<?php echo implode(",",$choix2) ?>" name="choix2" />
			<input type="hidden" value="<?php echo implode(",",$choix3) ?>" name="choix3" />

      <?php
          // Si i est inférieur à 12 on continue le questionnaire
          if ($i<12){
            ?>
            <input
          type="submit" value="Suivant" />
          <?php
          }
          // Sinon on arrive à l'affichage des résultats
          else{
            ?>
            <input
          type="submit" value="Voir ses résultats" />
          <?php
          }
          ?>
				</form>
	</body>
</html>
