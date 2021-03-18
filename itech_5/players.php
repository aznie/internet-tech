<?php

$dsn = "mysql:host=127.0.0.1; port=3306; dbname=itehLab1";
$user = 'localuser';
$pass = 'hellow0rld';
try {
    $dbh = new PDO($dsn, $user, $pass);

    $playerName = "SELECT name FROM player";

    $outputPlayer[] = array();

    unset($outputPlayer[0]);

    foreach ($dbh->query($playerName) as $row) {
        $outputPlayer[] .= $row['name'];
    }
} catch (PDOException $e) {
    echo $e;
}
