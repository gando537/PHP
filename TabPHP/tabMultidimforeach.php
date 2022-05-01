<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lecture d'un tableau indicé avec une boucle for...</title>
    </head>
    <body>
        <div>
            <?php
                /**
                 * Création d'un tableau
                 */
                $client = array("Client 1"=>array("nom 1"=>"Leparc", "ville 1"=>"Paris", "âge 1"=>"35"),
                                "Client 2"=>array("nom 2"=>"Duroc", "ville 2"=>"Vincennes", "âge 2"=>"22"),
                                "Client 3"=>array("nom 3"=>"Denoel", "ville 3"=>"Saint Cloud", "âge 3"=>"47"));

                /**
                 * Ajout d'un élément dans le tableau
                 */
                $client["Client 7"] = array("nom 7"=>"Duval", "ville 7"=>"Marseille", "âge 7"=>"76");

                echo "<table border=\"1\" width=\"100%\">";

                /**
                 * En-tête du tableau
                 */
                echo "<thead><tr> <th> Client </th><th> Nom </th><th> Ville </th><th> Âge </th>
                </tr></thead>";

                /**
                 * Pied du tablaeu
                 */
                echo "<tfoot><tr> <th> Client </th><th> Nom </th><th> Ville </th><th> Âge </th>
                </tr></tfoot><tbody>";

                /**
                 * Lecture des indices et des valeurs
                 */
                $i = 0;
                foreach($client as $cle=>$tab)
                {
                    echo "<tr><td align=\"center\"><b>$cle</b></td>";
                    foreach($tab as $key=>$val)
                    {
                        echo "<td align=\"center\"> $key : <b>",$val, " </b></td>";
                    }
                    echo "</tr>";
                }
                echo "</body> </table> <hr />"
            ?>
        </div>
    </body>
</html>
