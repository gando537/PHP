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
            include_once("connectPDO.php");
            $id_conn = connectPDO("magasin", "myparam");

            $requete = "SELECT id_article AS 'Code article', design AS 'Désignation',
                                prix AS 'Prix Unitaire', categorie AS 'Catégorie'
                        FROM article
                        WHERE design LIKE '%Sony%'
                        ORDER BY categorie";
            $result = $id_conn->query($requete);
            if (!$result){
                $mess_erreur = $id_conn->errorInfo();
                echo "Lecture impossible, code", $id_conn->errorCode(), $mess_erreur[2];
            }
            else {
                $nbart = $result->rowCount();
                $tabresult = $result->fetchAll(PDO::FETCH_ASSOC);
                // Récupération des noms des colonnes ou des alias
                $titres = array_keys($tabresult[0]);
                echo "<h3>Tous nos articles de la marque Sony</h3>";
                echo "<h4>il y a $nbart articles en magasin </h4>";
                echo "<table border=\"1\"><tr style=\"color: #000000\">";
                foreach($titres as $colonne)
                    echo "<th>". htmlentities($colonne). "</th>";
                echo "</tr>";
                for($i = 0; $i < $nbart; $i++)
                {
                    echo "<tr>";
                    foreach($tabresult[$i] as $valcol)
                        echo "<td style=\"color: #000000\"> $valcol </td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            $result->closeCursor();
            $id_conn = null;
        ?>
    </body>
</html>