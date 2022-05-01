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
            $requete = "SELECT * FROM article ORDER BY categorie";
            $result = $id_conn->query($requete);
            if (!$result) {
                echo "Lecture Impossible !!!";
            }
            else {
                $nbart = $result->num_rows;
                echo "<h3>Tous nos articles par catégorie</h3>";
                echo "<h4>Il y a $nbart articles en magasin</h4>";
                echo "<table border=\"1\">";
                echo "<tr style=\"color: #000000\"><th> Code article </th><th> Description </th>
                <th> Prix </th><th> Catégorie </th></tr>";
                while ($ligne = $result->fetch_array(MYSQLI_NUM)) {
                    echo "<tr style=\"color: #000000\">";
                    foreach($ligne as $valeur)
                        echo "<td> $valeur</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>