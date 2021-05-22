<?php

$dsn = "mysql:host=127.0.0.1; port=3306; dbname=itehLab1";
$user = 'localuser';
$pass = 'hellow0rld';
header('Content-Type: application/json');
try {
    $dbh = new PDO($dsn, $user, $pass);

    $player = $_GET["player"];

    $playerstart =
    "SELECT DISTINCT team1.name name1, team2.name name2, game.date, game.place, game.score
    FROM game 
    INNER JOIN team team1 ON FID_Team1 = team1.ID_Team
    INNER JOIN team team2 ON FID_Team2 = team2.ID_Team, player
    WHERE 
    game.FID_Team1 = player.FID_Team
    AND 
    player.name = :player
    OR 
    game.FID_Team2 = player.FID_Team
    AND 
    player.name = :player";

    $sth = $dbh->prepare($playerstart);
    $sth->bindValue(':player', $player);
    $sth->execute();

    foreach ($sth->fetchAll() as $row) {
        $games[] = array(
            'date' => $row['date'],
            'place' => $row['place'],
            'score' => $row['score']
        );
    }
    echo json_encode($games);
} catch (PDOException $e) {
    echo $e;
}
