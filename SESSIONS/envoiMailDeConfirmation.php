<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style type="text/css">
            td {
                background-color: yellow;
                color: blue;
                font-family: arial, helvetica, sans-serif;
                font-size: 12pt;
                font-weight: bold;
            }
        </style>
        <title>Votre Commande</title>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
            <div><h3>Articles</h3>
                "HTML 5 et CSS 3" : 29.90 €<br />
                "PHP 5" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 29.50 €<br />
                "MySQL" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 19.75 €<br />
            </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <fieldset>
                <legend>Passez votre commande</legend>
                <table>
                    <tr>
                        <td>Article</td>
                        <td><input type="text" name="article" size="40" maxlength="256"/></td>
                    </tr>
                    <tr>
                        <td>Quantité</td>
                        <td><input type="text" name="quantite" size="40" /></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td><input type="text" name="nom" size="40" maxlength="256"/></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><input type="text" name="adresse" size="40" maxlength="256"/></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="mail" size="40" maxlength="256"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;<input type="submit" name="envoi" value="Commander" /></td>
                    </tr>
                </table>
            </fieldset>
        </form>

        <!-- CODE PHP -->
        <?php
            // Création des tarifs des livres
            $tarifs = array("HTML 5 et CSS 3" => 29.90, "PHP 5" => 29.50, "MySQL" => 19.75);
            // Gestion de la commande
            if (isset($_POST['article']) && isset($_POST['quantite']) && isset($_POST['nom'])
                && isset($_POST['mail']) && isset($_POST['adresse']))
            {
                $article = $_POST['article'];
                $prix = $tarifs[$article];
                $objet = "Confirmation de la commande";
                // contenu de l'e-mail
                $text = "Nous avons bien re&ccedil;u votre commende de : \n";
                $text .= "{$_POST['quantite']} livres ";
                $text .= $_POST['article'] . " au prix unitaire de : " . $prix . " euros \n";
                $text .= "Soit un prix total de : " . $prix * $_POST['quantite'] . " euros \n";
                $text .= "Adresse de livraison : \n" . $_POST['nom'] . " \n";
                $text .= $_POST['adresse'] . " \n";
                $text .= " Cordialement,";
                if (mail($_POST['mail'], $objet, $text))
                    echo "<h1>Vous allez recevoir un mail de confirmation</h1>";
                else
                    echo "<h1>L'e-mail n'a pas été envoyé : recommencez ! </h1>";
            }
        ?>
    </body>
</html>
