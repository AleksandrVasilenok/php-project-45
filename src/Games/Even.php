<?php

namespace BrainGames\Even;

use function cli\line;

function playEvenGame(): callable
{
    $rules = getRules();
    line($rules); // в Engine
    return function ()
    {
        $randomNumber = rand(1, 10);
        line($randomNumber);
        return correctAnswer($randomNumber);
    };
}

function correctAnswer($randomNumber): string // ивен
{
     if ($randomNumber % 2 === 0) {
        return 'yes';
     }

     return 'no';
}

function isCorrect(): callable
{
    return function ($answer, $correctAnswer) { // убрать в Engine
        if ($correctAnswer != $answer) {
            return false;
        } else {
            line("Correct!");
            return true;
        }
    };
}

function getRules(): string // ивен
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
