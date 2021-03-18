<?php

require 'connection.php';
header('Content-Type: application/json');

$league = $_GET['league'];

$cond = array("league" => array('$eq' => $league));
$cursor = $db->game->find($cond);
$result = iterator_to_array($cursor);

$game = array();
$place = array();
$score = array();
$winner = array();

foreach ($result as $key => $value) {
    $game[] = $value['game'];
    $place[] = $value['place'];
    $score[] = $value['score'];
    $winner[] = $value['winner'];
}

echo "Игры: " . json_encode($game) . " Месторасположения: " . json_encode($place) . " Результаты: " . json_encode($score) . " Победитель: " . json_encode($winner);
