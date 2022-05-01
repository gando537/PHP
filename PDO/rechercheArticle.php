<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Rechercher un article dans le magasin</title>
        <style type="text/css">
            fieldset {border: double medium red}
        </style>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>Rechercher un article en magasin</legend>
                <table>
                    <tr><td>Mot-clé :</td>
                    <td><input type="text" name="motcle" size="40" maxlength="40" value=""/></td></tr>
                    <tr><td>Dans la catégorie :</td>
                    <td>
                        <select name="categorie">
                            <option value="tous">Tous</option>
                            <option value="vidéo">Vidéo</option>
                            <option value="informatique">Informatique</option>
                            <option value="photo">Photo</option>
                            <option value="divers">Divers</option>
                        </select>
                    </td></tr>
                    <tr><td>Trier par :</td>
                    <td>
                        <select name="tri">
                            <option value="prix">Prix</option>
                            <option value="categorie">Catégorie</option>
                            <option value="id_client">Code</option>
                        </select>
                    </td></tr>
                    <tr><td>En ordre :</td>
                    <td>Croissant<input type="radio" name="ordre" value="ASC" checked="checked"/>
                        Décroissant<input type="radio" name="ordre" value="DESC"/>
                    </td></tr>
                    <tr><td>Envoyer</td>
                    <td><input type="submit" name="" value="OK" /></td></tr>
                </table>
            </fieldset>
        </form>
        <?php
            if (!empty($_POST['motcle']))
            {
                include_once('connectPDO.php');
                $motcle = strtolower($_POST['motcle']);
                $categorie = ($_POST['categorie']);
                $ordre = ($_POST['ordre']);
                $tri = ($_POST['tri']);
                $reqcategorie = ($_POST['categorie'] == "tous") ? "" : "AND categorie = '$categorie'";
                $requete = "SELECT id_article AS 'Code article', design AS 'Description', prix, categorie AS 'Catégorie'
                            FROM article
                            WHERE lower(design) LIKE '%$motcle%' $reqcategorie ORDER BY $tri $ordre";
                $id_connect = connectPDO('magasin', 'myparam');
                $result = $id_connect->query($requete);
                if (!$result)
                    echo "Lecture impossible !!!";
                else {
                    $nbcol = $result->columnCount();
                    $nbart = $result->rowCount();
                    if ($nbart == 0) {
                        echo "<h3>Il n'y a pas aucun article correspondant au mot-clé : $motcle</h3>";
                        exit;
                    }
                    $ligne = $result->fetch(PDO::FETCH_ASSOC);
                    $titres = array_keys($ligne);
                    $ligne = array_values($ligne);
                    echo "<h3> Il y a $nbart articles correspondant au mot clé : $motcle</h3>";
                    // Affichage des titres du tableau
                    echo "<table border=\"1\"><tr>";
                    foreach ($titres as $val)
                        echo "<th>". htmlentities($val). "</th>";
                    echo "</tr>";
                    // affichages des valeurs du tableau
                    do
                    {
                        echo "<tr>";
                        foreach ($ligne as $donnee)
                            echo "<td>", $donnee, "</td>";
                        echo "</tr>";
                    } while($ligne = $result->fetch(PDO::FETCH_NUM));
                }
                echo "</table>";
                $result->closeCursor();
                $id_connect = null;
            }
        ?>
    </body>
</html>