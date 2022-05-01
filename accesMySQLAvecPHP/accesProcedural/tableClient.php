<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lecture de la table client</title>
        <style>
            table {border-style: double;
                    border-width: 3px;
                    border-color: red;
                    background-color: yellow;}
        </style>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <?php
            include_once("connect.php");
            $idconnect = connect("magasin", "myparam");

            $requete = "SELECT id_client AS 'Code client', nom, prenom, adresse, age
                        FROM client
                        WHERE ville='Paris'
                        ORDER BY nom";
            $result = mysqli_query($idconnect, $requete);
            if (!$result)
                echo "Lecture impossible !";
            else {
                $nbcol = mysqli_num_fields($result);
                $nbclient = mysqli_num_rows($result);
                echo "<h3>il y a $nbclient clients habitant à Paris</h3>";
                // affichage des titres du tableau
                echo "<table border=\"1\"><tr style=\"color: #000000\">";
                for ($i = 0 ; $i < $nbcol ; $i++)
                {
                    $finfo = mysqli_fetch_field_direct($result, $i);
                    echo "<th>". $finfo->name. "</th>";
                }
                echo "</tr>";
                // affichages des valeurs du tableau
                for ($i = 0 ; $i < $nbclient ; $i++)
                {
                    $ligne = mysqli_fetch_row($result);
                    echo "<tr style=\"color: #000000\">";
                    for ($j = 0 ; $j < $nbcol ; $j++)
                        echo "<td>", $ligne[$j], "</th>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            @mysqli_free_result($result);             //pour libérer la mémoire
        ?>
    </body>
</html>