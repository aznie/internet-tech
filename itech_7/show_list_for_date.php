<?php

$dsn = "mysql:host=127.0.0.1; port=3306; dbname=itehLab1";
$user = 'localuser';
$pass = 'hellow0rld';

header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");

try {
    $dbh = new PDO($dsn, $user, $pass);

    $date_from = $_GET["date_from"];
    $date_to = $_GET["date_to"];

    $date_interval =
    "SELECT DISTINCT team1.name name1, team2.name name2, game.date, game.place, game.score 
    FROM game
    INNER JOIN team team1 ON FID_Team1 = team1.ID_Team
    INNER JOIN team team2 ON FID_Team2 = team2.ID_Team
    WHERE 
    game.date 
    BETWEEN 
    :date_from 
    AND
    :date_to";

    $sth = $dbh->prepare($date_interval);
    $sth->bindValue(':date_from', $date_from);
    $sth->bindValue(':date_to', $date_to);
    $sth->execute();

    echo '<?xml version="1.0" encoding="utf8" ?>';
    echo "<root>";

    foreach ($sth->fetchAll() as $row) {
        echo '<game>';
        echo '<date>'.$row['date'].'</date>'.'<place>'.$row['place'].'</place>'.'<score>'.$row['score'].'</score>';
        echo '</game>';
    }
    echo "</root>";
} catch (PDOException $e) {
    echo $e;
}
