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
            $id_conn = connectObjet("magasin", "myparam");

            $requete = "SELECT id_article AS 'Code article', design AS 'Désignation',
                                prix AS 'Prix Unitaire', categorie AS 'Catégorie'
                        FROM article
                        WHERE design LIKE '%Sony%'
                        ORDER BY categorie";
            $result = $id_conn->query($requete);
            if (!$result)
                echo "Lecture impossible !";
            else {
                $nbart = $result->num_rows;
                $titres = $result->fetch_fields();
                echo "<h3>Tous nos articles de la marque Sony</h3>";
                echo "<h4>il y a $nbart articles en magasin </h4>";
                echo "<table border=\"1\"><tr style=\"color: #000000\">";
                foreach($titres as $colonne)
                    echo "<th>". htmlentities($colonne->name). "</th>";
                echo "</tr>";
                $tabresult = $result->fetch_all();
                foreach($tabresult as $ligne)
                {
                    echo "<tr>";
                    foreach($ligne as $valcol)
                        echo "<td style=\"color: #000000\"> $valcol </td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            $result->free();             //pour libérer la mémoire
            $id_conn->close();
        ?>
    </body>
</html>