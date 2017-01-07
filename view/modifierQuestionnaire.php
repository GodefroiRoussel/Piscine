<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Questionnaire</title>
		<!-- <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;"> -->
		<link rel="stylesheet" href="../Formulaire/Formulaire.css">
    <script type="text/javascript" src="../assets/js/modifierQuestionnaire.js"></script>
<!--		<script type="text/javascript" src="../Formulaire/Formulaire2.js"></script> -->
	</head>

	<body>
		<header>
			<div id="connexion">
				<?php include("buttonInscription.php"); ?>
			</div>
      <div id="menu">
  			<?php include("menu.php"); ?>
  		</div>
		</header>
		<div class="table-title">
			<h3>Test RIASEC</h3>
		</div>

    <form method="get" action="modifierQuestionnaire.controller.php">
       <label for="numGroupe">Groupe </label>
       <select name="numGroupe" id="numGroupe">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
       </select>
   <input type="submit" value="Charger" />
</form>

    <!-- Rajouter cette condition dans le afficherQuestionnaire.controller.php
         Mettre le css dans un fichier css
         -->
    <form method="post" action="modifierQuestionnaire.controller.php?numGroupe=<?php echo $i ?>" onsubmit="return verifPropositions()">
  		<table class="table-fill">
  			<thead>
  				<tr>
  					<th style="width:7%" class="text-left"></th>
  					<th class="text-left"><center><strong>Groupe <?php echo $i ?></strong></center></th>
  				</tr>
  			</thead>
  			<tbody class="table-hover">
  				<tr>
  					<th class="text-left">A</th>
            <td class="text-left proposition">
             <textarea style="width:100%;height:100%" id="proposition1" name="proposition1"><?php echo $propositions[0]['description'] ?></textarea>
            </td>
  				</tr>

  				<tr>
  					<th class="text-left">B</th>
            <td class="text-left proposition">
             <textarea style="width:100%;height:100%" id="proposition2" name="proposition2"><?php echo $propositions[1]['description'] ?></textarea>
            </td>
  				</tr>
  				<tr>
  					<th class="text-left">C</th>
            <td class="text-left proposition">
             <textarea style="width:100%;height:100%" id="proposition3" name="proposition3"><?php echo $propositions[2]['description'] ?></textarea>
            </td>
  				</tr>
  				<tr>
  					<th class="text-left">D</th>
            <td class="text-left proposition">
             <textarea style="width:100%;height:100%" id="proposition4" name="proposition4"><?php echo $propositions[3]['description'] ?></textarea>
            </td>
  				</tr>
  				<tr>
  					<th class="text-left">E</th>
            <td class="text-left proposition">
             <textarea style="width:100%;height:100%" id="proposition5" name="proposition5"><?php echo $propositions[4]['description'] ?></textarea>
            </td>
  				</tr>
  				<tr>
  					<th class="text-left">F</th>
            <td class="text-left proposition">
             <textarea style="width:100%;height:100%" id="proposition6" name="proposition6"><?php echo $propositions[5]['description'] ?></textarea>
            </td>
  				</tr>
  			</tbody>
  		</table>

      <input type="submit" value="Valider les modifications"/>
				</form>
	</body>
</html>
