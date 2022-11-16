<?php

namespace BrainGames\Prime;

use function cli\line;

function playPrimeGames(): callable
{
    return function () {
        line('Question: %s', $number = rand(1, 100));
        $x = 2;
        $multiplierNumbers = [];
        while ($number !== 1) {
            if ($number % $x === 0) {
                $number = $number / $x;
                $multiplierNumbers[] = $x;
            } else {
                $x++;
            }
        }
        return correctAnswer($multiplierNumbers);
    };
}

function correctAnswer(array $multiplierNumbers): string
{
    if (count($multiplierNumbers) < 2) {
        return "yes";
    } else {
        return "no";
    }
}


function getRules(): callable
{
    return function () {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    };
}
