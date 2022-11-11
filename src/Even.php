<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function playEvenGame($name): void
{
    $rules = getRules(); // общая
    line($rules); // общая
    for ($round = 0; $round != 3; $round++) { // общая логика
        line("Question: "); //общий
        $randomNumber = rand(1, 10); // ивен
        line($randomNumber . "\n"); // ивен
        $answer = prompt('Your answer'); // общий
        $isCorrect = isCorrect($answer, $randomNumber, $name); // ивен
        if (!$isCorrect) { // общая (можно пока оставить у ивен)
            break;
        }
    }

    if ($round === 3) { // общий
        line("Congratulations, $name! \n");
    }
}

function isCorrect($answer, $randomNumber, $name): bool // ивен
{
    $isEven = $randomNumber % 2 === 0;
    if ($answer == 'yes' && $isEven) {
        line("Correct");
        return true;
    }

    if ($answer == 'no' && !$isEven) {
        line("Correct");
        return true;
    }

    $correctAnswer = $isEven ? 'yes' : 'no';
    line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
    return false;
}

function getRules(): string // ивен
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
