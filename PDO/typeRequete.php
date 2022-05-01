<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Insertion et lecture de la table client</title>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <?php
            include_once("connectPDO.php");
            $id_connex = connectPDO("magasin", "myparam");
            // Requête sans résultat
            $requete1 = "UPDATE client SET age = 43 where id_client = 7";
            $nb_lign = $id_connex->exec($requete1);
            echo "<p>$nb_lign ligne(s) modifiée(s)<hr /></p>";
            // Requête avec résultats
            $requete2 = "SELECT * FROM client ORDER BY nom";
            $result = $id_connex->query($requete2);
            if (!$result)
            {
                $mess_erreur = $id_connex->errorInfo();
                echo "Lecture impossible, code", $id_connex->errorCode(), $mess_erreur[2];
            }
            else {
                while ($row = $result->fetch(PDO::FETCH_NUM)) {
                    foreach($row as $donn)
                        echo $donn, "&nbsp;";
                    echo "<hr />";
                }
                $result->closeCursor();
            }
            $id_connex = null;
        ?>
    </body>
</html>