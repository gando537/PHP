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
                include_once('connect.php');
                $id_connect = connect('magasin', 'myparam');
                $motcle = strtolower(mysqli_real_escape_string($id_connect, $_POST['motcle']));
                $categorie = mysqli_real_escape_string($id_connect, $_POST['categorie']);
                $ordre = mysqli_real_escape_string($id_connect, $_POST['ordre']);
                $tri = mysqli_real_escape_string($id_connect, $_POST['tri']);
                $reqcategorie = ($_POST['categorie'] == "tous") ? "" : "AND categorie = '$categorie'";
                $requete = "SELECT id_article AS 'Code client', design AS 'Description', prix, categorie AS 'Catégorie'
                            FROM article
                            WHERE lower(design) LIKE '%$motcle%' $reqcategorie ORDER BY $tri $ordre";
                $result = mysqli_query($id_connect, $requete);
                mysqli_close($id_connect);
                if (!$result)
                    echo "Lecture impossible !!!";
                else {
                    $nbcol = mysqli_num_fields($result);
                    $nbart = mysqli_num_rows($result);
                    echo "<h3> Il y a $nbart articles correspondant au mot clé : $motcle</h3>";
                    // Affichage des titres du tableau
                    echo "<table border=\"1\"><tr>";
                    for ($i = 0 ; $i < $nbcol ; $i++)
                    {
                        $finfo = mysqli_fetch_field_direct($result, $i);
                        echo "<th>". $finfo->name. "</th>";
                    }
                    echo "</tr>";
                    // affichages des valeurs du tableau
                    for ($i = 0 ; $i < $nbart ; $i++)
                    {
                        $ligne = mysqli_fetch_row($result);
                        echo "<tr>";
                        for ($j = 0 ; $j < $nbcol ; $j++)
                            echo "<td>", $ligne[$j], "</th>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                @mysqli_free_result($result);             //pour libérer la mémoire
            }
        ?>
    </body>
</html>