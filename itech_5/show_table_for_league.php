<?php

$dsn = "mysql:host=127.0.0.1; port=3306; dbname=itehLab1";
$user = 'localuser';
$pass = 'hellow0rld';
try {
    $dbh = new PDO($dsn, $user, $pass);

    $league = $_GET["league"];

    $leaguestart = 
    "SELECT DISTINCT team1.name name1, team2.name name2, game.date, game.place, game.score
    FROM game
    INNER JOIN team team1 ON FID_Team1 = team1.ID_Team
    INNER JOIN team team2 ON FID_Team2 = team2.ID_Team 
    WHERE 
    game.FID_Team1 = team1.ID_Team 
    AND 
    team1.league = :league";

    $sth = $dbh->prepare($leaguestart);
    $sth->bindValue(':league', $league);
    $sth->execute();

    foreach ($sth->fetchAll() as $row) {
        echo $row['date'];
        echo "<br>";
        echo $row['place'];
        echo "<br>";
        echo $row['name1'];
        echo "<br>";
        echo $row['score'];
        echo "<br>";
        echo $row['name2'];
        echo "<br><br>";
    }
} catch (PDOException $e) {
    echo $e;
}
