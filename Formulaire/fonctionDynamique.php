<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Fonction dynamique</title>
        <style type="text/css">
            fieldset {border: double medium blue}
        </style>
    </head>
    <body>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <fieldset>
                <legend><b>Choisissez votre fonction et son paramètre</b></legend>
                <input type="text" name="fonction" value="<?= isset($_POST["fonction"]) ?
                $_POST["fonction"] : "" ?>" />
                <input type="text" name="param" value="<?= isset($_POST["param"]) ?
                $_POST["param"] : "" ?>" />
                <input type="submit" value="Calculer" />
            </fieldset>
        </form>

        <!-- Code PHP -->

        <?php
            function foo($p)
            {
                return $p * 2;
            }
            if (isset($_POST["fonction"]) && isset($_POST["fonction"]) != ""
                && isset($_POST["param"]) && isset($_POST["param"]) != "")
            {
                $fonction = $_POST["fonction"];
                $param = $_POST["param"];
                if (function_exists($fonction))
                    echo "Résultat : $fonction($param) = ", $fonction($param);
                else
                    echo "ERREUR DE FONCTION!";
            }
        ?>
    </body>
</html>