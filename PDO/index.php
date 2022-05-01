<?php
require 'db-config.php';

try
{
    $options =
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);

    $request_sql = 'SELECT *
                   FROM fv_clients
                   WHERE client_firstname = ?';

    $results = $PDO->prepare($request_sql);

    $results->bindValue(1, "Fatima");

    $results->execute();

    $list_client = $results->fetchAll(PDO::FETCH_ASSOC);
    $results->closeCursor();

    foreach($list_client as $client)
    {
        echo '<p>'.$client['client_lastname'].'</p>';
    }

}
catch(PDOException $pe)
{
    echo 'ERROR : '.$pe->getMessage();
}