<!DOCTYPE html>

<?php
      require_once('../vendor/autoload.php');
      require_once('../model/connexionBD.php');
      require_once('../model/GroupeDeProposition.php');
      use \Firebase\JWT\JWT;

?>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Questionnaire</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		<link rel="stylesheet" href="Formulaire.css">
		<script type="text/javascript" src="Formulaire2.js"></script>
	</head>

	<body>
		<div class="table-title">
			<h3>Test RIASEC</h3>
		</div>
<?php
      $i = 1;
      $propositions=getPropositionsGroupe($i); //On a dans $propositions toutes les propositions du groupe 1 puis 2 ... c'est un array
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
					<td> <input type="radio" name="rep1" onclick="remove1('a','R',<?php echo $i?>)" id="a1" </td> <!-- remplacer le 'R',le numéro du groupe et la proposition par la base de données -->
					<td> <input type="radio" name="rep2" onclick="remove2('a','R',<?php echo $i?>)" id="a2" </td>
					<td> <input type="radio" name="rep3" onclick="remove3('a','R',<?php echo $i?>)" id="a3" </td>
				</tr>

				<tr>
					<th class="text-left">B</td>
					<td class="text-left"><?php echo $propositions[1]['description'] ?></td>
					<td> <input type="radio" name="rep1" onclick="remove1('b','I',<?php echo $i?>)" id="b1" </td>
					<td> <input type="radio" name="rep2" onclick="remove2('b','I',<?php echo $i?>)" id="b2" </td>
					<td> <input type="radio" name="rep3" onclick="remove3('b','I',<?php echo $i?>)" id="b3"  </td>
				</tr>
				<tr>
					<th class="text-left">C</td>
					<td class="text-left"><?php echo $propositions[2]['description'] ?></td>
					<td> <input type="radio" name="rep1" onclick="remove1('c','A',<?php echo $i?>)" id="c1" </td>
					<td> <input type="radio" name="rep2" onclick="remove2('c','A',<?php echo $i?>)" id="c2" </td>
					<td> <input type="radio" name="rep3" onclick="remove3('c','A',<?php echo $i?>)" id="c3" </td>
				</tr>
				<tr>
					<th class="text-left">D</td>
					<td class="text-left"><?php echo $propositions[3]['description'] ?></td>
					<td> <input type="radio" name="rep1" onclick="remove1('d','S',<?php echo $i?>)" id="d1" </td>
					<td> <input type="radio" name="rep2" onclick="remove2('d','S',<?php echo $i?>)" id="d2" </td>
					<td> <input type="radio" name="rep3" onclick="remove3('d','S',<?php echo $i?>)" id="d3"  </td>
				</tr>
				<tr>
					<th class="text-left">E</td>
					<td class="text-left"><?php echo $propositions[4]['description'] ?></td>
					<td> <input type="radio" name="rep1" onclick="remove1('e','E',<?php echo $i?>)" id="e1" </td>
					<td> <input type="radio" name="rep2" onclick="remove2('e','E',<?php echo $i?>)" id="e2" </td>
					<td> <input type="radio" name="rep3" onclick="remove3('e','E',<?php echo $i?>)" id="e3"  </td>
				</tr>
				<tr>
					<th class="text-left">F</td>
					<td class="text-left"><?php echo $propositions[5]['description'] ?></td>
					<td> <input type="radio" name="rep1" onclick="remove1('f','C',<?php echo $i?>)" id="f1" </td>
					<td> <input type="radio" name="rep2" onclick="remove2('f','C',<?php echo $i?>)" id="f2" </td>
					<td> <input type="radio" name="rep3" onclick="remove3('f','C',<?php echo $i?>)" id="f3"  </td>
				</tr>
			</tbody>
		</table>

		<!-- <div id="MaDiv">r=0</div>
		<div id="MaDiv2">i=0</div>
		<div id="MaDiv3">a=0</div>
		<div id="MaDiv4">s=0</div>
		<div id="MaDiv5">e=0</div>
		<div id="MaDiv6">c=0</div> -->
		<input type="submit" name="nom" value=" Envoyer " onclick="calcul()" >

	</body>
</html>
