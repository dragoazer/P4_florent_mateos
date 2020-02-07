<!DOCTYPE html>
<html>
    <head>
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
        <header>
            <div class="headerTab">
                <a href="index.php">Accueil</a>
            </div>
            <div class="headerTab">
                <a href="index.php?action=registration">Connexion</a><span> || </span> <a href="index.php?action=registration">Inscription</a>
            </div>
            <div class="headerTab">
                <a href="index.php?action=listPost">Blog</a> 
            </div>
            <div class="headerTab">
                <a <?= isset($_SESSION["connected"])? "href='index.php?action=displayAccount'": "href='index.php?action=registration'"?>><?= isset($_SESSION["connected"])? $_SESSION["pseudo"] : "Non connecté" ?></a>
                <?= isset($_SESSION["connected"])? '<p><a href="index.php?action=disconnect">Déconnection</a></p>' :  "" ?>
            </div>
            <div class="headerTab">
                <a href="index.php?action=faq">Faq</a>
            </div>     
          </header>
        <?= $content ?>
    </body>
</html>