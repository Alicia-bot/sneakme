<header>
        <?php
            session_start();
        ?>
        <nav class="navigation">
            <a href="index.php" class="logo-lien">
                <img class="logo" id="logo" src="images/logo-header.png" alt="Logo Sneak Me">
            </a>
            <ul class="menu">
                <li><a href="index.php" class="nav-lien">Accueil</a></li>
                <hr>
                <li><a href="men_page.php" class="nav-lien">Homme</a></li>
                <hr>
                <li><a href="women_page.php" class="nav-lien">Femme</a></li>
                <hr>
                <?php 
                    if(isset($_SESSION['logged'])){
                        echo'<li><a href="#" class="nav-lien">Mon compte</a>
                            <ul id="sous-page">
                            <li><a href="functions/logout.php"> Se déconnecter </a></li>';
                            if(isset($_SESSION['role']) && $_SESSION['role'] == 'moderator'){
                                echo'<li><a href="administration_bot.php"> Gérer le bot </a></li>
                                    <li><a href="administration_product.php"> Créer un produit</a></li>
                                    <li><a href="administration_list_product.php"> Liste des produits</a></li>
                                    '
                                ;
                            }
                        echo'</ul>';
                    } else {
                        echo'<li><a href="inscription.php" class="nav-lien">Connexion</a></li>';
                    }
                ?>
                </li>
                <hr>
                <li id="cart"><i class="fas fa-shopping-cart"></i></li>
               
            </ul>
        </nav>

    </header>

    <?php include "bot.html"?>