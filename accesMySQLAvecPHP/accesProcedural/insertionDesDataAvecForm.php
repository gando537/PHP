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
            if (!empty($_POST['nom']) && !empty($_POST['adresse']) && !empty($_POST['ville']))
            {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $adresse = $_POST['adresse'];
                $ville = $_POST['ville'];
                $age = $_POST['age'];
                $mail = $_POST['mail'];
                $id_connect = connect('magasin', 'myparam');
                $id_client = mysqli_insert_id($id_connect);
                $requete = "INSERT INTO client VALUES('$id_client', '$nom', '$prenom', '$age', '$adresse', '$ville', '$mail')";
                $result = mysqli_query($id_connect, $requete);
                $num_client = mysqli_insert_id($id_connect);
                mysqli_close($id_connect);
                if (!$result)
                    echo "<h2>Erreur d'insertion \n n° ", @mysqli_errno($id_connect)," : ", @mysqli_error($id_connect),"</h2>";
                else{
                    echo "<script type=\"text/javascript\">
                        alert('Vous êtes enrégistré. Votre numéro de client est : ".$num_client."')</script>";
                }
            }
            else
                echo "Formulaire à compléter !";
        ?>
    </body>
</html>