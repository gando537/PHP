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
                $client = array(array("Leparc", "Paris", "35"),
                                array("Duroc", "Vincennes", "22"),
                                array("Denoel", "Saint Cloud", "47"));
                /**
                 * Alternative à la création du même tableau
                 * $tab1 = array("Leparc", "Paris", "35");
                 * $tab2 = array("Duroc", "Vincennes", "22");
                 * $tab3 = array("Denoel", "Saint Cloud", "47");
                 * $client = array($tab1, $tab2, $tab3);
                 */

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
                $i = 0 ;
                while(isset($client[$i]))
                {
                    echo "<tr><td align=\"center\"><b>$i</b></td>";
                    $j = 0;
                    while(isset($client[$i][$j]))
                    {
                        echo "<td align=\"center\"><b>",$client[$i][$j], " </b></td>";
                        $j++;
                    }
                    $i++;
                    echo "</tr>";
                }
            ?>
            </tbody>
            </table>
        </div>
    </body>
</html>
