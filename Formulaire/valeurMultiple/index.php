<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Compétences informatiques</title>
    </head>
    <body>
        <div>
            <?php
                if (isset($_POST["ident"]) && isset($_POST["lang"]) && isset($_POST["competent"]))
                {
                    echo "<table border=\"1\"> <tr><th>Récaputilatif de votre fiche d'inforamtions personnelles</th></tr><tr><td>";
                    $nom = $_POST["ident"][0];
                    $prenom = $_POST["ident"][1];
                    $age = $_POST["ident"][2];
                    $lang = $_POST["lang"];
                    $competent = $_POST["competent"];

                    echo "Vous êtes : <b> $prenom ", stripcslashes($nom), "</b><br /> Vous avez : <b> $age ans </b>";
                    echo "<br />Vous parlez :";
                    echo "<ul>";
                    foreach($lang as $valeur)
                        echo " <li> $valeur </li>";
                    echo "</ul>";
                    echo "Vous avez des compétences informatiques en :";
                    echo "<ul>";
                    foreach($competent as $valeur)
                        echo "<li> $valeur </li>";
                    echo "</ul></td></tr>";
                }
                else
                {
                    echo "<script type=\"test/javascript\">";
                    echo "alert('Saisissez votre nom et cochez au moins une compétence !');";
                    echo "window.history.back();";
                    echo "</script>";
                }
            ?>
        </div>
    </body>
</html>