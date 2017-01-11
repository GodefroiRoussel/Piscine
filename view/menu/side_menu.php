<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="../assets/img/find_user.png" class="img-responsive" />

                    </li>

                    <li>
                        <a href="redirection.php"><i class="fa fa-desktop "></i>Tableau de bord</a>
                    </li>
                    <?php
                      if($decoded_array['role']==="admin"){
                    			?>
                    <li>
                        <a href="#"><i class="fa fa-table "></i>Gérer les administrateurs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="ajoutAdmin.controller.php">Ajouter un administrateur</a>
                            </li>
                            <li>
                                <a href="consulterAdmin.controller.php">Consulter les administrateurs</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="administrerPromo.controller.php"><i class="fa fa-table "></i>Administrer les promotions</a>
                    </li>

                    <li>
                        <a href="modifierQuestionnaire.controller.php"> <i class="fa fa-edit "></i>Modifier le test </a>
                    </li>

                    <li>
                        <a href="statistiques.controller.php"><i class="fa fa-bar-chart-o"></i>Statistiques</a>
                    </li>
                    <?php
                  }
                  //endif ADMIN
                  else if($decoded_array['role']==="etudiant"){
                    ?>

                    <li>
                        <a href="formulaire.controller.php"> <i class="fa fa-edit "></i>Passer le questionnaire </a>
                    </li>

                    <?php
                      // Si ce n'est pas son premier test alors il peut consulter ses résultats
                      if (!premierTest($decoded_array['id'])){
                        ?>
                        <li>
                            <a href="resultat.controller.php"><i class="fa fa-bar-chart-o"></i>Résultat</a>
                        </li>
                      <?php
                    }//endif premiertest
                  }//endif ETUDIANT
                    ?>
                    <li>
                        <a href="../controller/modifierCompte.controller.php"><i class="fa fa-gear "></i>Mon Compte </a>
                    </li>

                    <li>
                        <a href="../controller/deconnexion.controller.php"><i class="fa fa-sign-out"></i>Deconnexion </a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
