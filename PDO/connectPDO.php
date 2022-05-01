<?php
    function connectPDO($db, $param)
    {
        include_once($param.".inc.php");
        $dsn = "mysql:host=". MYHOST."; dbname=".$db;
        $user = MYUSER;
        $pass = MYPASS;
        try {
            $id_connex = new PDO($dsn, $user, $pass);
            return $id_connex;
        } catch (PDOException $except) {
            echo "Échec de connexion ", $except->getMessage();
            return False;
            exit();
        }
    }
?>