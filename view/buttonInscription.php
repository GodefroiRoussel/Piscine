<?php
if(isset($_COOKIE["token"])){
              ?>
  	           <a href="../controller/modifierCompte.controller.php" class="btn btn-info">Mon Compte </a>
            	 <a href="../controller/deconnexion.controller.php" class="btn btn-info">Deconnexion </a>


<?php
    }
		else {
			?>
        				<a href="../controller/inscription.controller.php" class="btn btn-info">M'inscrire</a>
        		<?php
        		}
		?>
