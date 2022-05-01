<?php
    session_start();
    $_SESSION['html'] = 0;
    if ($_SESSION['acces'] != "oui"){
        header("Location:sessions.php");
    }
    else {
        echo "<h4>Bonjour ". $_SESSION['nom']."</h4>";
        if (isset($_SESSION['html'])){
            $_SESSION['html']++;
        }
    }
?>

<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>La page de HTML</title>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <h4>Accés réservé aux personnes autorisées </h4>
        <p>Visiter les autres pages du site :
            <?php echo "Page HTML vue ". $_SESSION['html']. " fois"; ?>
            <ul>
                <li><a href="sessions.php?<?php echo SID?>">Page d'accueil</a></li>
                <li><a href="pagephp.php?<?php echo SID?>">Page PHP</a>
                <? if (isset($_SESSION['php'])) echo " vue ". $_SESSION['php']. " fois "; ?></li>
            </ul>
        </p>
        <h3>Contenu de la page HTML</h3>
    </body>
</html>