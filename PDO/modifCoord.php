<?php
    if (empty($_POST['code'])) {
        header("Locatioon:saisiClientModife.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Modifiez Vos Coordonnées</title>
        <style type="text/css">
            fieldset {border: double medium red}
        </style>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <?php
            include_once('connectPDO.php');
            $id_connect = connectPDO('magasin', 'myparam');
            if (!isset($_POST['modif']))
            {
                // CRÉATION DU FORMULAIRE
                $code = (integer)$_POST['code'];
                $requete = "SELECT * FROM client WHERE id_client='$code'";
                $result = $id_connect->query($requete);
                $coord = $result->fetch(PDO::FETCH_NUM);
                // Création du formulaire
                echo "<form action=\"". $_SERVER['PHP_SELF']."\" method=\"post\" enctype=\"application/x-www-form-urlencoded\">";
                echo "<fieldset>";
                echo "<legend><b>Modifiez vos coordonnées</b></legend>";
                echo "<table>";
                echo "<tr><td> Nom : </td><td><input type=\"text\" name=\"nom\" size=\"40\" maxlength=\"30\" value=\"$coord[1]\"/></td></tr>";
                echo "<tr><td> Prénom : </td><td><input type=\"text\" name=\"prenom\" size=\"40\" maxlength=\"30\" value=\"$coord[2]\" /></td></tr>";
                echo "<tr><td> Âge : </td><td><input type=\"text\" name=\"age\" size=\"40\" maxlength=\"2\" value=\"$coord[3]\" /></td></tr>";
                echo "<tr><td> Adresse : </td><td><input type=\"text\" name=\"adresse\" size=\"40\" maxlength=\"60\" value=\"$coord[4]\" /></td></tr>";
                echo "<tr><td> Ville : </td><td><input type=\"text\" name=\"ville\" size=\"40\" maxlength=\"30\" value=\"$coord[5]\" /></td></tr>";
                echo "<tr><td> E-mail : </td><td><input type=\"text\" name=\"mail\" size=\"40\" maxlength=\"30\" value=\"$coord[6]\" /></td></tr>";
                echo "<tr><td><input type=\"reset\" value=\"Effacer\" /></td>";
                echo "<td><input type=\"submit\" name=\"modif\" value=\"Enrégistrer\"></td></tr>";
                echo "</table></fieldset>";
                echo "<input type=\"hidden\" name=\"code\" value=\"$code\" />";
                echo "</form>";
                $result->closeCursor();
                $id_connect = null;
            }
            elseif (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville'])) {
                // ENRÉGISTREMENT
                $nom = $id_connect->quote($_POST['nom']);
                $adresse = $id_connect->quote($_POST['adresse']);
                $ville = $id_connect->quote($_POST['ville']);
                $mail = $id_connect->quote($_POST['mail']);
                $code = $id_connect->quote($_POST['code']);
                $age = (integer)$_POST['age'];
                $requete = "UPDATE client SET nom=$nom, adresse=$adresse, ville=$ville, age=$age, mail=$mail WHERE id_client=$code";
                $result = $id_connect->exec($requete);
                if ($result != 1) {
                    echo "<script type=\"text/javascript\">
                    alert('Erreur : ".$id_connect->errorCode()."')</script>";
                }
                else {
                    echo "<script type=\"text/javascript\">
                    alert('Vos modifications sont enrégistrées !');window.location='saisiClientModife.php';</script>";
                }
                $result->closeCursor();
                $id_connect = null;
            }
            else
                echo "Modifiez vos coordonnées !";
        ?>
    </body>
</html>