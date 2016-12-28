<!doctype html>


<html>

	<head>
		<meta charset="utf-8" />
		<title>Table Style</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		<link rel="stylesheet" href="Formulaire.css">
		<script type="text/javascript" src="Formulaire2.js"></script>
	</head>

	<body>
		<div class="table-title">
			<h3>Test RIASEC</h3>
		</div>
		<table class="table-fill">
			<thead>
				<tr>
					<th class="text-left"></th>
					<th class="text-left"><center><strong>Groupe 1</strong></center></th>
					<th class="text-left">1</th>
					<th class="text-left">2</th>
					<th class="text-left">3</th>
				</tr>
			</thead>
			<tbody class="table-hover">
				<tr>
					<th class="text-left">A</td>
					<td class="text-left">Vous aimez avoir des activités à l extérieur, travailler en plein air</td>
					<td> <input type="radio" name="rep1" onclick="remove1('r','R',1)" id="r1"> </td> <!-- remplacer le 'R',le numéro du groupe et la proposition par la base de données -->
					<td> <input type="radio" name="rep2" onclick="remove2('r','R',1)" id="r2"> </td>
					<td> <input type="radio" name="rep3" onclick="remove3('r','R',1)" id="r3">  </td>
				</tr>

				<tr>
					<th class="text-left">B</td>
					<td class="text-left">Vous aimez élargir vos connaissances par l'étude, pouvoir appronfondir un sujet</td>
					<td> <input type="radio" name="rep1" onclick="remove1('a','I',1)" id="a1"> </td>
					<td> <input type="radio" name="rep2" onclick="remove2('a','I',1)" id="a2"> </td>
					<td> <input type="radio" name="rep3" onclick="remove3('a','I',1)" id="a3">  </td>
				</tr>
				<tr>
					<th class="text-left">C</td>
					<td class="text-left">Vous aimez travailler de façon indépendante, sans méthode ni objectif structurés</td>
					<td> <input type="radio" name="rep1" onclick="remove1('b','A',1)" id="b1"> </td>
					<td> <input type="radio" name="rep2" onclick="remove2('b','A',1)" id="b2"> </td>
					<td> <input type="radio" name="rep3" onclick="remove3('b','A',1)" id="b3">  </td>
				</tr>
				<tr>
					<th class="text-left">D</td>
					<td class="text-left">Vous aimez travailler avec d'autres personnes pour les informer</td>
					<td> <input type="radio" name="rep1" onclick="remove1('c','S',1)" id="c1"> </td>
					<td> <input type="radio" name="rep2" onclick="remove2('c','S',1)" id="c2"> </td>
					<td> <input type="radio" name="rep3" onclick="remove3('c','S',1)" id="c3">  </td>
				</tr>
				<tr>
					<th class="text-left">E</td>
					<td class="text-left">Vous admirez les personnes qui ont du pouvoir et gagnent beaucoup d'argent</td>
					<td> <input type="radio" name="rep1" onclick="remove1('d','E',1)" id="d1"> </td>
					<td> <input type="radio" name="rep2" onclick="remove2('d','E',1)" id="d2"> </td>
					<td> <input type="radio" name="rep3" onclick="remove3('d','E',1)" id="d3">  </td>
				</tr>
				<tr>
					<th class="text-left">F</td>
					<td class="text-left">Vous aimez travailler avec des chiffres</td>
					<td> <input type="radio" name="rep1" onclick="remove1('e','C',1)" id="e1"> </td>
					<td> <input type="radio" name="rep2" onclick="remove2('e','C',1)" id="e2"> </td>
					<td> <input type="radio" name="rep3" onclick="remove3('e','C',1)" id="e3">  </td>
				</tr>
			</tbody>
		</table>
		<!-- <div id="MaDiv">r=0</div>
		<div id="MaDiv2">i=0</div>
		<div id="MaDiv3">a=0</div>
		<div id="MaDiv4">s=0</div>
		<div id="MaDiv5">e=0</div>
		<div id="MaDiv6">c=0</div> -->
		<table class="table-fill">
		<pre>
		<h1></h1>
			<thead>
				<tr>
					<th class="text-left"></th>
					<th class="text-left"><center><strong>Groupe 2</strong></center></th>
					<th class="text-left">1</th>
					<th class="text-left">2</th>
					<th class="text-left">3</th>
				</tr>
			</thead>
			<tbody class="table-hover">
				<tr>
					<th class="text-left">A</td>
					<td class="text-left">Vous admirez les personnes qui travaillent pour soigner les autres</td>
					<td> <input type="radio" name="rep1.2" onclick="remove1('f','S',2)" id="f1"> </td>
					<td> <input type="radio" name="rep2.2" onclick="remove2('f','S',2)" id="f2" value="false"> </td>
					<td> <input type="radio" name="rep3.2" onclick="remove3('f','S',2)" id="f3" value="false">  </td>
				</tr>
				<tr>
					<th class="text-left">B</td>
					<td class="text-left">Vous aimez une organisation claire et bien définie</td>
					<td> <input type="radio" name="rep1.2" onclick="remove1('g','C',2)" id="g1"> </td>
					<td> <input type="radio" name="rep2.2" onclick="remove2('g','C',2)" id="g2"> </td>
					<td> <input type="radio" name="rep3.2" onclick="remove3('g','C',2)" id="g3">  </td>
				</tr>
				<tr>
					<th class="text-left">C</td>
					<td class="text-left">Vous aimez contribuer à atteindre les objectifs d'un organisation</td>
					<td> <input type="radio" name="rep1.2" onclick="remove1('h','E',2)" id="h1"> </td>
					<td> <input type="radio" name="rep2.2" onclick="remove2('h','E',2)" id="h2"> </td>
					<td> <input type="radio" name="rep3.2" onclick="remove3('h','E',2)" id="h3">  </td>
				</tr>
				<tr>
					<th class="text-left">D</td>
					<td class="text-left">Vous aimez le sport, vous dépenser physiquement</td>
					<td> <input type="radio" name="rep1.2" onclick="remove1('i','R',2)" id="i1"> </td>
					<td> <input type="radio" name="rep2.2" onclick="remove2('i','R',2)" id="i2"> </td>
					<td> <input type="radio" name="rep3.2" onclick="remove3('i','R',2)" id="i3">  </td>
				</tr>
				<tr>
					<th class="text-left">E</td>
					<td class="text-left">Vous aimez étudier les choses, les phénomènes ou les comportements</td>
					<td> <input type="radio" name="rep1.2" onclick="remove1('j','I',2)" id="j1"> </td>
					<td> <input type="radio" name="rep2.2" onclick="remove2('j','I',2)" id="j2"> </td>
					<td> <input type="radio" name="rep3.2" onclick="remove3('j','I',2)" id="j3">  </td>
				</tr>
				<tr>
					<th class="text-left">F</td>
					<td class="text-left">Vous admirez les personnes qui ont des capacités artistiques</td>
					<td> <input type="radio" name="rep1.2" onclick="remove1('k','A',2)" id="k1"> </td>
					<td> <input type="radio" name="rep2.2" onclick="remove2('k','A',2)" id="k2"> </td>
					<td> <input type="radio" name="rep3.2" onclick="remove3('k','A',2)" id="k3">  </td>
				</tr>
			</tbody>
		</table>

		<table class="table-fill">
		<pre>
		<h1></h1>
			<thead>
				<tr>
					<th class="text-left"></th>
					<th class="text-left"><center><strong>Groupe 3</strong></center></th>
					<th class="text-left">1</th>
					<th class="text-left">2</th>
					<th class="text-left">3</th>
				</tr>
			</thead>
			<tbody class="table-hover">
				<tr>
					<th class="text-left">A</td>
					<td class="text-left">Vous aimez travailler avec d'autres personnes pour les former, les entrainer</td>
					<td> <input type="radio" name="rep1.3" onclick="remove1('l','S',3)" id="l1"> </td>
					<td> <input type="radio" name="rep2.3" onclick="remove2('l','S',3)" id="l2"> </td>
					<td> <input type="radio" name="rep3.3" onclick="remove3('l','S',3)" id="l3">  </td>
				</tr>
				<tr>
					<th class="text-left">B</td>
					<td class="text-left">Vous aimez les changements ou les situations imprévues</td>
					<td> <input type="radio" name="rep1.3" onclick="remove1('m','A',3)" id="m1"> </td>
					<td> <input type="radio" name="rep2.3" onclick="remove2('m','A',3)" id="m2"> </td>
					<td> <input type="radio" name="rep3.3" onclick="remove3('m','A',3)" id="m3">  </td>
				</tr>
				<tr>
					<th class="text-left">C</td>
					<td class="text-left">Vous aimez ne faire qu'une seule chose à la fois et vous ne vous laissez pas distraire</td>
					<td> <input type="radio" name="rep1.3" onclick="remove1('n','C',3)" id="n1"> </td>
					<td> <input type="radio" name="rep2.3" onclick="remove2('n','C',3)" id="n2"> </td>
					<td> <input type="radio" name="rep3.3" onclick="remove3('n','C',3)" id="n3">  </td>
				</tr>
				<tr>
					<th class="text-left">D</td>
					<td class="text-left">Vous aimez donner des ordres ou consignes et organiser l'activité des autres</td>
					<td> <input type="radio" name="rep1.3" onclick="remove1('o','E',3)" id="o1"> </td>
					<td> <input type="radio" name="rep2.3" onclick="remove2('o','E',3)" id="o2"> </td>
					<td> <input type="radio" name="rep3.3" onclick="remove3('o','E',3)" id="o3">  </td>
				</tr>
				<tr>
					<th class="text-left">E</td>
					<td class="text-left">Vous aimez tirer vos propres conclusions de l'analyse d'une situation donnée</td>
					<td> <input type="radio" name="rep1.3" onclick="remove1('p','I',3)" id="p1"> </td>
					<td> <input type="radio" name="rep2.3" onclick="remove2('p','I',3)" id="p2"> </td>
					<td> <input type="radio" name="rep3.3" onclick="remove3('p','I',3)" id="p3">  </td>
				</tr>
				<tr>
					<th class="text-left">F</td>
					<td class="text-left">Vous aimez conduire des véhicules ou faire fonctionner des machines</td>
					<td> <input type="radio" name="rep1.3" onclick="remove1('q','R',3)" id="q1"> </td>
					<td> <input type="radio" name="rep2.3" onclick="remove2('q','R',3)" id="q2"> </td>
					<td> <input type="radio" name="rep3.3" onclick="remove3('q','R',3)" id="q3">  </td>
				</tr>
			</tbody>
		</table>
		<input type="submit" name="nom" value=" Envoyer " onclick="calcul()" >

	</body>
</html>
