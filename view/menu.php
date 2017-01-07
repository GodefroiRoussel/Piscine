<?php
if(!isset($_COOKIE["token"])){
              ?>
              <ul>
                <li><a href="redirection.php">Accueil</a></li>
                <li><a href="contact.asp">Contact</a></li>
              </ul>


<?php
    }
		else if($decoded_array['role']==="admin"){
			?>
              <ul>
                <li><a href="redirection.php">Accueil</a></li>
                <li><a href="afficherQuestionnaire.controller.php">Questionnaire</a></li>
                <li><a href="news.asp">Statistique</a></li>
                <li><a href="administrerPromo.controller.php">Administrer une promotion</a></li>
                <li><a href="contact.asp">Contact</a></li>
              </ul>

        		<?php
        		}
    else if($decoded_array['role']==="etudiant"){
      ?>
      <ul>
        <li><a href="redirection.php">Accueil</a></li>
        <li><a href="formulaire.controller.php">Questionnaire</a></li>
        <?php
        // Si ce n'est pas son premier test alors il peut consulter ses résultats
        if (!premierTest($decoded_array['id'])){
          ?>
          <li><a href="resultat.controller.php">Résultat</a></li>
        <?php
        }
        ?>
        <li><a href="contact.asp">Contact</a></li>
      </ul>
    <?php
    }
		?>
