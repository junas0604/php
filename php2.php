<?php

function calculateSquares($n) {
    $squares = array();
    for ($i = 1; $i <= $n; $i++) {
        $squares[] = round(sqrt($i),2);
    }
    return $squares;
}

function displaySquares($squares) {
    foreach ($squares as $i => $square) {
        echo $i + 1  . " = " . $square ."<br>"."<br>";
    }
}

$squares = calculateSquares(5);
displaySquares($squares);


?>