<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lecture de la table Client</title>
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

            $requete = "SELECT id_client AS 'Code_client', nom, prenom, adresse, age, mail
                        FROM client
                        WHERE ville = 'Paris'
                        ORDER BY nom";
            $result = $id_conn->query($requete);
            if (!$result){
                $mess_erreur = $id_conn->errorInfo();
                echo "Lecture impossible, code", $id_conn->errorCode(), $mess_erreur[2];
            }
            else {
                $nbclt = $result->rowCount();
                $ligne = $result->fetchObject();
                echo "<h3>il y a $nbclt clients habitant Paris </h3>";
                echo "<table border=\"1\"><tr style=\"color: #000000\">";
                foreach($ligne as $nom=>$val)
                    echo "<th>". $nom. "</th>";
                echo "</tr>";
                echo "<tr>";
                do
                {
                    echo "<td style=\"color: #000000\">", $ligne->Code_client, "</td>",
                    "<td style=\"color: #000000\">", $ligne->nom, "</td>",
                    "<td style=\"color: #000000\">", $ligne->prenom, "</td>",
                    "<td style=\"color: #000000\">", $ligne->adresse, "</td>",
                    "<td style=\"color: #000000\">", $ligne->age, "</td>",
                    "<td style=\"color: #000000\">", $ligne->mail, "</td></tr>";
                }while ($ligne = $result->fetchObject());
                echo "</table>";
            }
            $result->closeCursor();
            $id_conn = null;
        ?>
    </body>
</html>