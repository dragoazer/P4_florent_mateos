<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1, width=device-width">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="<?= $css ?>" rel="stylesheet"/> 
        <link href="public/css/header.css" rel="stylesheet" /> 
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>tinymce.init({selector:'.tinyMce'});</script>
    </head>
    <body>
        <nav id="navHeader">
            <div class="headerTab">
                <a href="index.php" class="navCenter">
                    <p class="anchorMenu">Accueil</p>
                    <img id="homeLogo" src="public/images/home.png">
                </a>
                <div class="BordMenu"><hr class="BordIntMenu"><hr class="BordIntMenu"></div>
            </div>
            <div class="headerTab">
                <div class="navCenter menuLineB">
                        <a href="index.php?action=registration" class="anchorMenu">Connexion</a>
                        <hr class="hrMenu">
                        <a href="index.php?action=registration" class="anchorMenu">Inscription</a>
                </div>
                <div class="BordMenu"><hr class="BordIntMenu"><hr class="BordIntMenu"></div>
            </div>
            <div class="headerTab">
                <div class="navCenter">
                    <a href="index.php?action=listPost" class="anchorMenu">Blog</a>
                </div> 
                <div class="BordMenu"><hr class="BordIntMenu"><hr class="BordIntMenu"></div>
            </div>
            <div class="headerTab">
                <div class="navCenter menuLineB">
                    <a class="anchorMenu" <?= isset($_SESSION["connected"])? "href='index.php?action=displayAccount'": "href='index.php?action=registration'"?>><?= isset($_SESSION["connected"])? $_SESSION["pseudo"] : "Non connecté" ?></a>
                    <hr class="hrMenu">
                    <?= isset($_SESSION["connected"])? '<a href="index.php?action=disconnect" class="anchorMenu">Déconnection</a>' :  "" ?>
                </div>
                <div class="BordMenu"><hr class="BordIntMenu"><hr class="BordIntMenu"></div>
            </div>
        </nav>
        <?= $content ?>
        <footer>
            <div id="homeMargin">
                <p id="footerDecoration">Me contacter</p>
                <p><span id="footerDecoration">Email</span> : jean.forte.roche@roche.fr</p>
                <p><span id="footerDecoration">Adresse</span> : 13 rue du cailloux, Amiens 8000</p>
                <p><span id="footerDecoration">Numéro</span> : 09 05 85 63 48</p>
            </div>
            <div>
                <p><a class="anchorMenu" href="">FaceBook</a></p>
                <p><a class="anchorMenu" href="">Twiter</a></p>
                <p><a class="anchorMenu" href="">Plan du site</a></p>
                <p><a class="anchorMenu" href="">Mentions légales</a></p>
            </div>
        </footer>
    </body>
</html>