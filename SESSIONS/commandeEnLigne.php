<?php
    session_start();
    $prix_total = 0;
    if (isset($_POST["envoi"])) {
        // AJOUTER
        if ($_POST["envoi"] == "AJOUTER" && $_POST["code"] != ""
        && $_POST["article"] != "" && $_POST["prix"] != "")
        {
            $code = $_POST["code"];
            $article = $_POST["article"];
            $prix = $_POST["prix"];
            if (isset($_SESSION["code"]) && isset($_SESSION["article"]) && isset($_SESSION["prix"]))
            {
                $_SESSION['code'] = $_SESSION['code']. "//". $code;
                $_SESSION['article'] = $_SESSION['article']. "//". $article;
                $_SESSION['prix'] = $_SESSION['prix']. "//". $prix;
            }
            else
            {
                $_SESSION['code'] = "//".$code;
                $_SESSION['article'] = "//".$article;
                $_SESSION['prix'] = "//".$prix;
            }
        }

        //VERIFIER
        if ($_POST["envoi"] == "VERIFIER")
        {
            echo "<table border=\"1\" >";
            echo "<tr><td colspan=\"3\"> <b>Récapitulatif de votre commande</b></td>";
            echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;
            </th><th>&nbsp;prix&nbsp&nbsp;</th>";
            $total = 0;
            $tab_code = array();
            if (isset($_SESSION["code"]) && isset($_SESSION["article"]) && isset($_SESSION["prix"]))
            {
                $tab_code = explode("//", $_SESSION['code']);
                $tab_article = explode("//", $_SESSION['article']);
                $tab_prix = explode("//", $_SESSION['prix']);
            }
            for ($i = 1; $i < count($tab_code); $i++)
            {
                echo "<tr><td> {$tab_code[$i]}</td> <td>{$tab_article[$i]}</td>
                <td>".sprintf("%01.2f", $tab_prix[$i]). "</td>";
                $prix_total += $tab_prix[$i];
            }
            echo "<tr><td colspan=\"2\"> PRIX TOTAL </td><td>".sprintf("%01.2f", $prix_total). "</td>";
            echo "</table>";
        }

        // ENREGISTRER
        if ($_POST["envoi"] == "ENREGISTRER")
        {
            //enrégistrement dans un fichier mais en pratique il vaut mieux une base de données
            $id_file = fopen("commande.txt", "w");
            $tab_code = array();
            if (isset($_SESSION["code"]) && isset($_SESSION["article"]) && isset($_SESSION["prix"]))
            {
                $tab_code = explode("//", $_SESSION['code']);
                $tab_article = explode("//", $_SESSION['article']);
                $tab_prix = explode("//", $_SESSION['prix']);
            }
            for ($i = 1; $i < count($tab_code); $i++)
            {
                fwrite($id_file, $tab_code[$i]. " ; ". $tab_article[$i]. " ; ". $tab_prix[$i]. "; \n");
            }
            fclose($id_file);
        }

        // LOGOUT
        if ($_POST["envoi"] == "LOGOUT")
        {
            session_unset();
            session_destroy();
            echo "<h3> La session est terminée</h3>";
        }
        $_POST["envoi"] = "";
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Gestion de paniers</title>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <fieldset>
                <legend>Saisies d'articles</legend>
                <table>
                    <tbody>
                        <tr><th>Code : </th>
                        <td><input type="text" name="code"/></td></tr>
                        <tr><th>Article : </th>
                        <td><input type="text" name="article"/></td></tr>
                        <tr><th>Prix : </th>
                        <td><input type="text" name="prix"/></td></tr>
                        <tr>
                            <td colspan="3">
                                <input type="submit" name="envoi" value="AJOUTER" />
                                <input type="submit" name="envoi" value="VERIFIER" />
                                <input type="submit" name="envoi" value="ENREGISTRER" />
                                <input type="submit" name="envoi" value="LOGOUT" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </body>
</html>