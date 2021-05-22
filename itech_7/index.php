<?php require "leagues.php"; ?>
<?php require "players.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>itech_7</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="ajax.js"></script>
</head>

<body>

    <form action="show_table_for_league.php">
        <p>
            Вариант 7. Создать и заполнить произвольными данными БД для хранения информации о результатах футбольного чемпионата (Рисунок 5.7).

            Для каждой футбольной команды задается такая информация:
            название, лига, главный тренер. Для каждой игры задается дата проведения, команды участницы, место проведения, финальный счет, участвующие футболисты.

            Сформировать запросы и вывести результаты:
        </p>
        <select name="league">
            <?php
            foreach ($outputLeague as $league) {
                echo "<option value=\"$league\">$league</option>";
            }
            ?>
        </select>
        <p>
            <input type="button" value="таблица чемпионата выбранной лиги" onclick="getHTML(this);">
        </p>
    </form>

    <table align="center">
        <tbody id="res1"></tbody>
    </table>

    <form action="show_list_for_date.php">
        <input type="datetime-local" name="date_from" value="<?php echo Date('Y-m-d\TH:i', time()); ?>">
        <input type="datetime-local" name="date_to" value="<?php echo Date('Y-m-d\TH:i', time()); ?>">
        <p>
            <input type="button" value="список игр на указанный временной интервал" onclick="getXML(this);">
        </p>
    </form>

    <table align="center">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Место игры</th>
                <th>Счет</th>
            </tr>
        </thead>
        <tbody id="res2"></tbody>
    </table>

    <form action="show_list_for_player.php">
        <select name="player">
            <?php
            foreach ($outputPlayer as $player) {
                echo "<option value=\"$player\">$player</option>";
            }
            ?>
        </select>
        <p>
            <input type="button" value="список игр выбранного футболиста" onclick="getJSON(this);">
        </p>
    </form>

    <table align="center">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Место игры</th>
                <th>Счет</th>
            </tr>
        </thead>
        <tbody id="res3"></tbody>
    </table>

</body>