<?php

function vowelCount($word)
{
    return substr_count($word, 'a')+substr_count($word, 'e')+substr_count($word, 'i')+substr_count($word, 'o')+substr_count($word, 'u');
}

$example1 = vowelCount('apple');
$example2 = vowelCount('lynx');
$example3 = vowelCount('hi');
$example4 = vowelCount('mississippi');

echo $example1;
echo $example2;
echo $example3;
echo $example4;


require 'index-view.php';
require 'Person.php';

$person = new Person('John', 'Harvard', 45);
echo $person->firstName;
echo $person->getFullName();
echo $person->getClassification();