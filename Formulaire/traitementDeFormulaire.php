<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Formulaire traité par PHP</title>
        <style type="text/css">
            fieldset {border: double medium blue}
        </style>
    </head>
    <body>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post"
        enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend><b>Infos</b></legend>
                <div>
                    Nom : <input type="text" name="nom" size="40"
                    value="<?php if(isset($_POST["nom"])) echo $_POST["nom"]?>"/><br/>
                    Débutant : <input type="radio" name="niveau" value="débutant"
                    <?php if(isset($_POST["niveau"]) && $_POST["niveau"] == "débutant")
                    echo "checked=\"checked\"" ?> />
                    Initié : <input type="radio" name="niveau" value="initié"
                    <?php if(isset($_POST["niveau"]) && $_POST["niveau"] == "initié")
                    echo "checked=\"checked\""?>  /><br/>
                    <input type="reset" value="Effacer" /><br/>
                    <input type="submit" value="Envoyer" /><br/>
                </div>
            </fieldset>
        </form>
        <?php
            if (isset($_POST["nom"]) && isset($_POST["niveau"]))
            {
                echo "<h2> Bonjour ". stripslashes($_POST["nom"]). " Vous êtes ".
                $_POST["niveau"]. " en PHP";
            }
        ?>
    </body>
</html>
