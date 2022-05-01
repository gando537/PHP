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

            $requete = "SELECT id_article AS 'Code article', design AS 'Désignation',
                                prix AS 'Prix Unitaire', categorie AS 'Catégorie'
                        FROM article
                        WHERE design LIKE '%Sony%'
                        ORDER BY categorie";
            $result = mysqli_query($idconnect, $requete);
            if (!$result)
                echo "Lecture impossible !";
            else {
                $nbcol = mysqli_num_fields($result);
                $nbart = mysqli_num_rows($result);
                $ligne = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo "<h3>Tous nos articles de la marque Sony</h3>";
                echo "<h4>il y a $nbart articles en magasin </h4>";
                echo "<table border=\"1\"><tr style=\"color: #000000\">";
                foreach($ligne as $nomcol=>$valcol)
                    echo "<th> $nomcol </th>";
                echo "</tr>";

                do
                {
                    echo "<tr>";
                    foreach($ligne as $valcol)
                        echo "<td style=\"color: #000000\"> $valcol </td>";
                    echo "</tr>";
                }while ($ligne = mysqli_fetch_array($result, MYSQLI_NUM));
                echo "</table>";
            }
            @mysqli_free_result($result);             //pour libérer la mémoire
        ?>
    </body>
</html>