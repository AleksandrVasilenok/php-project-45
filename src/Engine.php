<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function play(callable $func, $name, callable $isCorrect)
{
    for ($round = 0; $round < 3; $round++) {
        $correctAnswer = $func();
        $answer = prompt('Your answer');
        if (!$isCorrect($answer, $correctAnswer)) // упросить, логика из isCorrect только в Engine
        {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
            break;
        }
        if ($round == 2) // лучше вынести за цикл
        {
            line("Congratulations, $name!");
        }
    }

}