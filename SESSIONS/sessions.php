<?php
    session_start();
    if (isset($_POST['login']) == "gan2" && $_POST['pass'] == "hawa") {
        $_SESSION['acces'] = "oui";
        $_SESSION['nom'] = $_POST['login'];
    }
?>

<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>LES SESSIONS</title>
    </head>
    <body style="background-color: #252525; color: #ECF0F1">
        <div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <fieldset>
                    <legend>Accés réservé aux personnes autorisées : identifiez vous !</legend>
                    <label>Login : </label><input type="text" name="login" />
                    <label>Pass : &nbsp;</label><input type="password" name="pass" />
                    <input type="submit" name="envoi" value="Entrer" />
                </fieldset>
            </form>
            <br />Visiter les pages du site <br />
            <ul>
                <li><a href="pagehtml.php?<?php echo SID?>">Page HTML</a><? if (isset($_SESSION['html'])) echo
                " vue ". $_SESSION['html']. " fois "; ?></li>
            </ul>
            <ul>
                <li><a href="pagephp.php?<?php echo SID?>">Page PHP</a><? if (isset($_SESSION['php'])) echo
                " vue ". $_SESSION['php']. " fois "; ?></li>
            </ul>
        </div>
    </body>
</html>