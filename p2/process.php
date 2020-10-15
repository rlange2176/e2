<?php

session_start();

$fruit1 = $_GET['fruit1'];

$fruits = [
    'Banana' => 100,
    'Cherry' => 50,
    'Apple' => 40,
    'Lemon' => 25,
];


#computer's fruit selections
$fruit2 = array_rand($fruits, 1);

$fruit3 = array_rand($fruits, 1);


if ($fruit1 == $fruit2 and $fruit2 == $fruit3) {
    $winner = 'Player 1';
} else {
    $winner = 'The House';
}

$jackpot = $fruits[$fruit1] + $fruits[$fruit2] + $fruits[$fruit3];

$_SESSION['results'] = [
    'fruit1' => $fruit1,
    'fruit2' => $fruit2,
    'fruit3' => $fruit3,
    'winner' => $winner,
    'jackpot' => $jackpot,
];


header('Location: index.php');