<?php require "leagues.php"; ?>
<?php require "players.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>itech_5</title>
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
            <input type="submit" value="таблица чемпионата выбранной лиги">
        </p>
    </form>

    <form action="show_list_for_date.php">
        <input type="datetime-local" name="date_from" value="<?php echo Date('Y-m-d\TH:i',time()); ?>">
        <input type="datetime-local" name="date_to" value="<?php echo Date('Y-m-d\TH:i',time()); ?>">
        <p>
            <input type="submit" value="список игр на указанный временной интервал">
        </p>
    </form>

    <form action="show_list_for_player.php">
        <select name="player">
            <?php
            foreach ($outputPlayer as $player) {
                echo "<option value=\"$player\">$player</option>";
            }
            ?>
        </select>
        <p>
            <input type="submit" value="список игр выбранного футболиста">
        </p>
    </form>

</body>