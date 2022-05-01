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
            if ($id_conn = connectPDO("magasin", "myparam"))
            {
                $requete = "SELECT *
                            FROM article
                            ORDER BY categorie";
                $result = $id_conn->query($requete);
                if (!$result){
                    $mess_erreur = $id_connex->errorInfo();
                    echo "Lecture impossible, code", $id_connex->errorCode(), $mess_erreur[2];
                }
                else {
                    $nbart = $result->rowCount();
                    echo "<h3>Tous nos articles par catégorie</h3>";
                    echo "<h4>il y a $nbart articles en magasin </h4>";
                    echo "<table border=\"1\"><tr style=\"color: #000000\">";
                    echo "<tr style=\"color: #000000\"><th>Code article</th><th>Description
                    </th><th>Prix</th><th>Catégorie</th></tr>";
                    while($ligne = $result->fetch(PDO::FETCH_NUM))
                    {
                        echo "<tr>";
                        foreach($ligne as $valcol)
                            echo "<td style=\"color: #000000\"> $valcol </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                $result->closeCursor();
                $id_connex = null;
            }
        ?>
    </body>
</html>