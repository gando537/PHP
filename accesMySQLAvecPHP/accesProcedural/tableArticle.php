<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lecture de la table article</title>
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

            $requete = "SELECT * FROM article ORDER BY categorie";
            $result = mysqli_query($idconnect, $requete);
            if (!$result)
                echo "Lecture impossible !";
            else {
                $nbcol = mysqli_num_fields($result);
                $nbart = mysqli_num_rows($result);
                echo "<h3>Tous nos articles par catégories</h3>";
                echo "<h4>il y a $nbart articles en magasin </h4>";
                echo "<table border=\"1\"><tbody>";
                echo "<tr style=\"color: #000000\"><th> Code article </th><th> Description </th>
                <th> Prix </th><th> Catégorie </th></tr>";

                while ($ligne = mysqli_fetch_array($result, MYSQLI_NUM))
                {
                    echo "<tr>";
                    foreach($ligne as $valeur)
                        echo "<td style=\"color: #000000\"> $valeur </td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }
            @mysqli_free_result($result);             //pour libérer la mémoire
        ?>
    </body>
</html>