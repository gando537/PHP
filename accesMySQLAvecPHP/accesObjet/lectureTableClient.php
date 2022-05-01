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
            $idconnect = connectObjet("magasin", "myparam");

            $requete = "SELECT id_client AS 'Code_client', nom, prenom, adresse, age, mail
                        FROM client
                        WHERE ville='Paris'
                        ORDER BY nom";
            $result = $idconnect->query($requete);
            if (!$result)
                echo "Lecture impossible !";
            else {
                $nbclient = $result->num_rows;
                echo "<h3>il y a $nbclient clients habitant à Paris</h3>";
                // affichage des titres du tableau
                $titres = $result->fetch_object();
                echo "<table border=\"1\"><tr style=\"color: #000000\">";
                foreach ($titres as $colonne=>$val)
                    echo "<th>". $colonne. "</th>";
                echo "</tr>";
                // affichages des valeurs du tableau
                $result->data_seek(0); // remettre le cursor la première ligne
                while ($ligne = $result->fetch_object())
                {
                    echo "<tr style=\"color: #000000\">";
                    echo "<td>", $ligne->Code_client, "</td>",
                    "<td>", $ligne->nom, "</td>",
                    "<td>", $ligne->prenom, "</td>",
                    "<td>", $ligne->adresse, "</td>",
                    "<td>", $ligne->age, "</td>",
                    "<td>", $ligne->mail, "</td></tr>";
                }
                echo "</table>";
                $result->free();
                $idconnect->close();
            }
        ?>
    </body>
</html>