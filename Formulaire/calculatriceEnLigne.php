<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calculatrice en ligne</title>
    </head>
    <body>
        <!-- Code PHP -->
        <?php
            if (isset($_POST["calcul"]) && isset($_POST["nb1"]) && isset($_POST["nb2"]) &&
                !empty($_POST["nb1"]) && !empty($_POST["nb2"]))
            {
                switch($_POST["calcul"])
                {
                    case "Addition x+y" :
                        $res = $_POST["nb1"] + $_POST["nb2"];
                        break;
                    case "Soustraction x-y" :
                        $res = $_POST["nb1"] - $_POST["nb2"];
                        break;
                    case "Multiplication x*y" :
                        $res = $_POST["nb1"] * $_POST["nb2"];
                        break;
                    case "Division x/y" :
                        $res = $_POST["nb1"] / $_POST["nb2"];
                        break;
                    case "Puissance x^y" :
                        $res = pow($_POST["nb1"], $_POST["nb2"]);
                        break;
                    default :
                        break;
                }
            }
            else
                echo "<h3>Entrez deux nombres : </h3>";


            function setRaws($th, $step, $name, $res)
            {
                if($name == "result")
                    $val = $res;
                else if(isset($_POST[$name]))
                    $val = $_POST[$name];
                else
                    $val = '';
                echo "<tr>";
                echo "<th>". $th . "</th>";
                echo "<td><input type=\"number\" step=\"", $step,"\" name=\"", $name,"\" size=\"30\" value=\"$val\"/>";
                echo "</td></tr>";
            }
        ?>

        <!-- Code HTML du formulaire -->
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend><b>Calculatrice en ligne</b></legend>
                <table>
                    <tbody>
                        <?= setRaws("Nombre X", "0.1", "nb1", $res);
                            setRaws("Nombre Y", "0.1", "nb2", $res);
                            setRaws("Résultat", "0.5", "result", $res);
                        ?>
                        <tr>
                            <th>Choisissez  !</th>
                            <td>
                                <input type="submit" name="calcul" value="Addition x+y"/>
                                <input type="submit" name="calcul" value="Soustraction x-y"/>
                                <input type="submit" name="calcul" value="Multiplication x*y"/>
                                <input type="submit" name="calcul" value="Division x/y"/>
                                <input type="submit" name="calcul" value="Puissance x^y"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </body>
</html>
