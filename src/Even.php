<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function even($name): void
{
    $test = true;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($count = 0; $count != 3; $count++) {
        if ($test) {
            echo "Question: ";
            $randomNumber = rand(1, 10);
            echo $randomNumber . "\n";
            $answer = prompt('Your answer');
            $test = isEven($answer, $randomNumber, $name, $test);
        } else {
            break;
        }
    }
    if ($count === 3) {
        print_r("Congratulations, $name! \n");
    }
}

function isEven($answer, $randomNumber, $name, $test): bool
{
    if ($answer == 'yes' && $randomNumber % 2 == 0) {
        line("Correct");
    } elseif ($answer == 'no' && $randomNumber % 2 != 0) {
        line("Correct");
    } else {
        $correctAnswer = $randomNumber % 2 == 0 ? 'yes' : 'no';
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again,$name !");
        $test = false;
    }
    return $test;
}