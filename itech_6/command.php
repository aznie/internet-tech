<!doctype html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
    <ul id="messages">
        <?php

        require 'connection.php';
        header('Content-Type: text/html');

        $name = $_GET['command'];

        $cond = array("name" => array('$eq' => $name));
        $cursor = $db->command->find($cond);
        $result = iterator_to_array($cursor);

        foreach ($result as $key => $value) {
            $players[] = $value['players'];
            foreach ($value['players'] as $player) {
                echo "<li>$player</li>";
            }
        }

        ?>
    </ul>
    <script>
        $(document).ready(function() {
            localStorage.list = $('#messages').html();
        });
    </script>
</body>

</html>