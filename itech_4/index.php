<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>itech_4</title>
    <style type="text/css">
        body {
            background-color: silver;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div> Создать два произвольных массива &#9989<br>
        <?php

define("N", 10);

$array1 = array();
$array2 = array();
for ($i = 0; $i < N; $i++) {
    array_push($array1, rand(N, 100));
    array_push($array2, rand(N, 100));
}

echo "<br> Первый <br>";
print_r($array1);
echo "<br> Второй <br>";
print_r($array2);
?> <br> <br>
    </div>
    <div>
        Написать скрипт, который <br> <br>
        - убирает все дублирущие элементы каждого массива; &#9989 <br>
        <?php
echo "<br>";
$array1_unique = array_unique($array1);
$array2_unique = array_unique($array2);

print_r($array1_unique);
echo "<br>";
print_r($array2_unique);
echo "<br>";
?>
       <div> <br>
            - выводит количество дублирущих элементов двух массивов; &#9989 <br><br>
            <?php
print(2 * N - (count($array1_unique) + count($array2_unique)));
?> <br> <br>
        </div>
    </div>
    <div>
        - сливает два массива в один, убирая все дублирующие значения; &#9989 <br><br>
        <?php
$unique_merged_array = array_unique(array_merge($array1_unique, $array2_unique));

print_r($unique_merged_array);
?> <br> <br>
    </div>
    <div>
        - меняет местами значения массива (первый элемент массива становится последним, предпоследний - вторым, ..., последний первым).
        Использовать foreach. &#9989 <br><br>
    </div>
    <?php
$reversed_array = array();
foreach (array_reverse($unique_merged_array) as $i) {
    array_push($reversed_array, $i);
}

print_r($reversed_array);
?>
</body>