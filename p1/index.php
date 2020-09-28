<?php

$fruits = [
    'banana' => 100,
    'cherry' => 50,
    'apple' => 40,
    'plum' => 25,
    'peach' => 20,
    'lime' => 10,
    'lemon' => 5
];

#player's fruit selection
$fruit1 = array_rand($fruits, 1);

#computer's fruit selections
$fruit2 = array_rand($fruits, 1);

$fruit3 = array_rand($fruits, 1);


if ($fruit1 == $fruit2 and $fruit2 == $fruit3) {
    $winner = 'Player 1';
} else {
    $winner = 'The House';
}

$jackpot = $fruits[$fruit1] + $fruits[$fruit2] + $fruits[$fruit3];


require 'index-view.php';
