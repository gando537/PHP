<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Modifiez Vos Coordonnées</title>
        <style type="text/css">
            fieldset {border: double medium red}
        </style>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <form action="modifCoord.php" method="post" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>Saisissez votre codde client pour modifier vos coordonnées</legend>
                <table>
                    <tr><td>Code client :</td>
                    <td><input type="text" name="code" size="20" maxlength="10"/></td></tr>
                    <tr><td>Modifiez : </td> <td><input type="submit" value="Modifier"/></td></tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>