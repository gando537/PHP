<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Saisissez Vos Coordonnées</title>
        <style type="text/css">
            fieldset {border: double medium red}
        </style>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>Vos coordonnées</legend>
                <table>
                    <tr><td> Nom : </td><td><input type="text" name="nom" size="40" maxlength="30"></td></tr>
                    <tr><td> Prénom : </td><td><input type="text" name="prenom" size="40" maxlength="30"></td></tr>
                    <tr><td> Âge : </td><td><input type="text" name="age" size="40" maxlength="2"></td></tr>
                    <tr><td> Adresse : </td><td><input type="text" name="adresse" size="40" maxlength="60"></td></tr>
                    <tr><td> Ville : </td><td><input type="text" name="ville" size="40" maxlength="30"></td></tr>
                    <tr><td> E-mail : </td><td><input type="text" name="mail" size="40" maxlength="30"></td></tr>
                    <tr><td><input type="reset" value="Effacer"></td>
                    <td><input type="submit" value="Envoyer"></td></tr>
                </table>
            </fieldset>
        </form>
        <?php
            include_once("connect.php");
            $id_connect = connectObjet('magasin', 'myparam');
            if (!empty($_POST['nom']) && !empty($_POST['adresse']) && !empty($_POST['ville']))
            {
                $nom = $id_connect->escape_string($_POST['nom']);
                $prenom = $id_connect->escape_string($_POST['prenom']);
                $adresse = $id_connect->escape_string($_POST['adresse']);
                $ville = $id_connect->escape_string($_POST['ville']);
                $age = $id_connect->escape_string($_POST['age']);
                $mail = $id_connect->escape_string($_POST['mail']);
                $id_client = $id_connect->insert_id;
                $requete = "INSERT INTO client VALUES('$id_client', '$nom', '$prenom', '$age', '$adresse', '$ville', '$mail')";
                $result = $id_connect->query($requete);
                if (!$result) {
                    echo $id_connect->errno;
                    echo $id_connect->error;
                    echo "<script type=\"text/javascript\">
                    alert('Erreur : ". $id_connect->error. "')</script>";
                }
                else{
                    echo "<script type=\"text/javascript\">
                        alert('Vous êtes enrégistré. Votre numéro de client est : ".$id_connect->insert_id."')</script>";
                }
                $id_connect->close();
            }
            else
                echo "<h3>Formulaire à compléter !</h3>";
        ?>
    </body>
</html>