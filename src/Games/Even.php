<?php

namespace BrainGames\Even;

use function cli\line;

function playEvenGame(): callable
{
    return function () {
        $randomNumber = rand(1, 10);
        line('Question: %s', $randomNumber);
        return correctAnswer($randomNumber);
    };
}

function correctAnswer(int $randomNumber): string
{
    if ($randomNumber % 2 === 0) {
        return 'yes';
    }
    return 'no';
}

function getRules(): callable
{
    return function () {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    };
}
