<!DOCTYPE html>
<?php
    $variable1 = " PHP 5";
?>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <?php
            echo "<title> Une page pleine d'inclusions $variable1</title>";
        ?>
    </head>
    <body>
        <?php
            $variableext = "Ce texte provient d'un fichier inclus";
            echo "<div><h1 style=\"border-width:5;border-style:double;background-color:#ffcc99;\">
            Bienvenue sur le site $variable1 </h1>";
            echo "<h3> $variableext</h3>";
            echo "Nom du fichier exécuté : ", $_SERVER['PHP_SELF'],"&nbsp;&nbsp;&nbsp";
            echo "Nom du fichier inclus : ", __FILE__ , "</div> ";
        ?>