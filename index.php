<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneak me</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/botStyle.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <script src="https://kit.fontawesome.com/753aa87031.js" crossorigin="anonymous"></script>
</head>

<body>
<?php session_start();?>
    <!--Header-->
    <header>
        
        <nav class="navigation">
            <a href="index.html" class="logo-lien">
                <img class="logo" id="logo" src="images/logo-header.png" alt="Logo Sneak Me">
            </a>
            <ul class="menu">
                <li><a href="index.html" class="nav-lien">Accueil</a></li>
                <hr>
                <li><a href="men_page.html" class="nav-lien">Homme</a></li>
                <hr>
                <li><a href="women_page.html" class="nav-lien">Femme</a></li>
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
                <li><a href="shop.html" id="panier"><img src="images/panier.png" alt="Panier"></a></li>
            </ul>
        </nav>

    </header>

    <!--Bandeau-->
    <div>
        <a href="air_jordan_cactus_jack.html"><img id="promo" src="images/promo.png" alt="banner-promo"></a>
    </div>

    <!--Minifiches produits-->
        <h2>Tendances</h2>
        <hr>
        <section id="trend">
        <div class="flex">
            <a>
                <img src="images/af1-supreme.png" alt="Air Force 1 Low White Spreme">
                <br>
                <span>Air Force 1 Low White Spreme</span>
                <p>180€</p>
            </a>
            <a>
                <img src="images/aj1-red-black-white.png" alt="Air Force 1 Mid Gym Red Black..">
                <br>
                <span>Air Force 1 Mid Gym Red Black..</span>
                <p>160€</p>
            </a>
            <a>
                <img src="images/af1-travis-scott.png" alt="Air Jordan 1 Low Travis Scott..">
                <br>
                <span>Air Jordan 1 Low Travis Scott..</span>
                <p>1200€</p>
            </a>
            <a href="air_jordan_cactus_jack.html">
                <img src="images/air-jordan_marron1.png" alt="Air Jordan 1 Retro High Cact.">
                <br>
                <span>Air Jordan 1 Retro High Cact.</span>
                <p>1840€</p>
            </a>
        </div>
        <div class="flex">
            <a>
                <img src="images/aj1-dark.png" alt="Air Jordan 1 Mid Dark Teal">
                <br>
                <span>Air Jordan 1 Mid Dark Teal</span>
                <p>155€</p>
            </a>
            <a>
                <img src="images/cdg-70g.png" alt="Chuck All-Star 705 Hi C..">
                <br>
                <span>Chuck All-Star 705 Hi C..</span>
                <p>200€</p>
            </a>
            <a>
                <img src="images/aj4.png" alt="Air Jordan 4 Shimmer">
                <br>
                <span>Air Jordan 4 Shimmer</span>
                <p>290€</p>
            </a>
            <a>
                <img src="images/aj1-coral.png" alt="Air Jordan Mid Coral Chalk..">
                <br>
                <span>Air Jordan Mid Coral Chalk..</span>
                <p>155€</p>
            </a>
        </div>

        <!--Bloc depuis 2016-->
        </section>
        <section id="grey-background">
            <h3>Depuis 2016</h3>
            <hr>
            <p>Sneak Me est un site qui te permet d'acheter des paires de sneakers facilement, où que tu sois dans le monde.</p>
            <p>Toutes les paires vendues sur ce site sont 100% authentiques. Nous travaillons avec des revendeurs oficiels en Europe mais également avec des revendeurs indépendants afin de vous fournir tout au long de l'année <strong>les paires les plus rares du marché.</strong></p>
            <strong>Qu'est-ce que tu attends pour passer commande ?</strong>
        </section>

        <!--Logos des partenaires-->
        <section id="partners">
            <div class="flex title-partners">
                <div class="hr-style">
                    <hr>
                </div>
                <div class="marque">
                    <h2 id="test">Nos marques</h2>
                </div>
                <div class="hr-style">
                    <hr>
                </div>
            </div>
            <div class="logo-slider">
    <div class="logo-slide-track">
        <div class="slide">
            <img src="images/logos/adidas.png" alt="Logo Adidas" />
        </div>
        <div class="slide">
            <img src="images/logos/cactus_jack.png" alt="Logo Cactus Jack" />
        </div>
        <div class="slide">
            <img src="images/logos/converse.png" alt="Logo Converse" />
        </div>
        <div class="slide">
            <img src="images/logos/jordan.png" alt="Logo Jordan" />
        </div>
        <div class="slide">
            <img src="images/logos/lacoste.png" alt="Logo Lacoste" />
        </div>
        <div class="slide">
            <img src="images/logos/cdg.png" alt="Logo CDG" />
        </div>
        <div class="slide">
            <img src="images/logos/nike.png" alt="Logo Nike" />
        </div>
        <div class="slide">
            <img src="images/logos/puma.png" alt="Logo Puma" />
        </div>
        <div class="slide">
            <img src="images/logos/reebok.png" alt="Logo Reebok" />
        </div>
        <div class="slide">
            <img src="images/logos/supreme.png" alt="Logo Supreme" />
        </div>
        <div class="slide">
            <img src="images/logos/yeezy.png" alt="Logo Yeezy" />
        </div>
        <div class="slide">
            <img src="images/logos/vans.png" alt="Logo Vans" />
        </div>
    </div>
</div>
        </section>

        <!--Footer-->
        <footer class="flex">
            <div class="column">
                <span>Support</span>
                <a href="tel:xxxxxxxxxx">XX XX XX XX XX</a>
                <a href="mailto:Contact.sneakme@gmail.com">Contact.sneakme@gmail.com</a>
            </div>
            <div class="column">
                <hr>
                <span>En savoir plus</span>
                <a href="cgu.html">Mentions légales</a>
                <a href="cgv.html">Conditions générales de vente</a>
                <a href="mentions_legales.html">Conditions générales d'utilisation</a>
            </div>
            <div class="column">
                <hr>
                <span>Trouvez votre paire</span>
                <a href="men_page.html">Homme</a>
                <a href="women_page.html">Femme</a>
            </div>
            <div class="column">
                <hr>
                <span>Réseaux sociaux</span>
                <div id="social">
                    <a href="https://fr-fr.facebook.com/" target="_blank"><img src="images/footer/fb-logo.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/" target="_blank"><img src="images/footer/insta-logo.png" alt="Instagram"></a>
                    <a href="https://twitter.com/" target="_blank"><img src="images/footer/twitter-logo.png" alt="Twitter"></a>
                    <a href="https://www.youtube.com/" target="_blank"><img src="images/footer/youtube-logo.png" alt="Youtube"></a>
                    <a href="https://www.pinterest.fr/" target="_blank"><img src="images/footer/pinterest-logo.png" alt="Pinterest"></a>
                </div>
            </div>
        </footer>
            <div class="flex footer-pay">
                <p>© 2021 SNEAK ME</p>
                <div>
                    <img src="images/footer/paypal.png" alt="Paypal">
                    <img src="images/footer/cb.png" alt="Carte Bancaire">
                    <img src="images/footer/visa.png" alt="Visa">
                    <img src="images/footer/master-card.png" alt="Master Card">
                </div>
            </div>
    
    <!--Bot-->
    <div id="chat-bot">
    </div>
    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/botStyle.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

</body>