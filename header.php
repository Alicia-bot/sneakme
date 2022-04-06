<header>
        
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
                <li><a href="inscription.php" class="nav-lien">Mon compte</a>
                <?php
                if(isset($_SESSION['userName'])){
                    echo'<ul>
                        <li><a href="logout.php"> Se déconnecter </a></li>
                    </ul>';
                }
                ?>
                </li>
                <hr>
                <li><a href="shop.php" id="panier"><img src="images/panier.png" alt="Panier"></a></li>
            </ul>
        </nav>

    </header>