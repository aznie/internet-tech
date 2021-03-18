<?php

$dsn = "mysql:host=127.0.0.1; port=3306; dbname=itehLab1";
$user = 'localuser';
$pass = 'hellow0rld';
try {
    $dbh = new PDO($dsn, $user, $pass);

    $leagueName = "SELECT DISTINCT league FROM team";

    $outputLeague[] = array();

    unset($outputLeague[0]);

    foreach ($dbh->query($leagueName) as $row) {
        $outputLeague[] .= $row['league'];
    }
} catch (PDOException $e) {
    echo $e;
}
