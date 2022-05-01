<?php
    // Première partie du script
    if (isset($_POST["choix"]))
    {
        if (isset($_COOKIE["votant"]) && $_COOKIE["vote"])
        {
            $vote = $_COOKIE["vote"];
?>
<!-- Code JavaScript -->
<script type="text/javascript">
    alert('Vous avez déjà voté pour <?php echo $vote ?> !')
</script>

<!-- Deuxième partie du script -->
<?php
        }
        else{
            $vote = $_COOKIE["vote"];
            setcookie("votant", "true", time() + 300);
            setcookie("vote", "{$_POST['choix']}", time() + 300);
            // Enrégistrement du vote dans un fichier
            if (file_exists("sondage.txt"))
            {
                if ($id_file = fopen("sondage.txt", "a"))
                {
                    flock($id_file, 2);
                    fwrite($id_file, $_POST['choix']."\n");
                    flock($id_file, 3);
                    fclose($id_file);
                }
                else {
                    echo "Fichier introuvable";
                }
            }
            else {
                $id_file = fopen("sondage.txt", "w");
                fwrite($id_file, $_POST['choix']."\n");
                fclose($id_file);
            }
            // Fin de l'enrégistrement
?>

<!-- Code de JavaScript -->
<script type="text/javascript">
    alert('Merci de votre vote pour <?php echo $_POST['choix'] ?> !')
</script>

<!-- Troisième partie du code -->
<?php
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charsert=UTF-8"/>
        <title>Sondage</title>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <h2>Bienvenue sur le site PHP</h2>
        <!-- "<?php echo $_SERVER['PHP_SELF'] ?>" -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <fieldset>
                <legend>Votez pour votre technologie Internet pr&eacute;f&eacute;r&eacute;e</legend>
                <table>
                    <tbody>
                        <tr>
                            <td>Choix 1 : PHP/MySQL</td>
                            <td><input type="radio" name="choix" value="PHP et MySQL"/></td>
                        </tr>
                        <tr>
                            <td>Choix 2 : ASP.Net</td>
                            <td><input type="radio" name="choix" value="ASP.Net"/></td>
                        </tr>
                        <tr>
                            <td>Choix 3 : JSP</td>
                            <td><input type="radio" name="choix" value="JSP"/></td>
                        </tr>
                        <tr>
                            <td>Votez !</td>
                            <td><input type="submit" value="ENVOI"/></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </body>
</html>
