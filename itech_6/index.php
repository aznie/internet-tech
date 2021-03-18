<?php require 'connection.php'; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>itech_6</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>

    <form action="command.php" method="get">
        <p>
            Вариант 7. Создать и заполнить БД футбольного чемпионата.
            В базе представлены две коллекции - коллекция документов, описывающая команды (название, тренер, состав команды (массив футболистов)),
            и коллекция, содержащая документы, которые описывают игры чемпионата (лига, дата и место проведения, команды-участницы игры, победитель и т.д.).

            Предоставить пользователю возможность получения следующей информации:
        </p>
        <?php
        $cursor = $db->command->find([], ['projection' => ['name' => true, '_id' => false]]);
        $result = iterator_to_array($cursor);
        $teams = json_decode(json_encode($result), true);
        echo "<select name='command'>";
        foreach ($teams as $team) {
            echo "<option>" . $team['name'] . "</option>";
        }
        echo "</select>";
        ?>
        <p>
            <input type="submit" value="список футболистов указанной команды">
        </p>
        <a id="last" style="display: none" href="#">Show localStorage</a>
        <ul id="messages">
        </ul>
    </form>


    <form action="league.php" method="get">
        <?php
        $cursor = $db->game->find([], ['projection' => ['league' => true, '_id' => false]]);
        $result = iterator_to_array($cursor);
        $leagues = json_decode(json_encode($result), true);
        echo "<select name='league'>";
        foreach ($leagues as $league) {
            echo "<option>" . $league['league'] . "</option>";
        }
        echo "</select>";
        ?>
        <p>
            <input type="submit" value="таблица чемпионата для выбранной лиги">
        </p>
    </form>

    <form action="game.php" method="get">
        <?php
        $cursor = $db->command->find([], ['projection' => ['name' => true, '_id' => false]]);
        $result = iterator_to_array($cursor);
        $teams = json_decode(json_encode($result), true);
        echo "<select name='game'>";
        foreach ($teams as $team) {
            echo "<option>" . $team['name'] . "</option>";
        }
        echo "</select>";
        ?>
        <p>
            <input type="submit" value="список игр, в которых участвовала выбранная команда">
        </p>
    </form>

    <script>
        $(document).ready(function() {
            if (localStorage.getItem('list') !== null) {
                $('#last').css('display', 'block');
            }

            $('#last').click(function() {
                let msg = $('#messages');
                if (!msg.children().length) {
                    msg.html(localStorage.getItem('list'));
                    $(this).html('Hide');
                } else if (msg.hasClass('hiden')) {
                    msg.removeClass('hiden');
                    $(this).html('Hide');
                } else {
                    msg.addClass('hiden');
                    $(this).html('Show localStorage');
                }
            });
        });
    </script>

</body>

</html>