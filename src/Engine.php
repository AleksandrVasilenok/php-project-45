<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function play(string $name, callable $func, callable $getRules): void
{
    line($getRules());
    for ($round = 0; $round < 3; $round++) {
        $correctAnswer = $func();
        $userAnswer = prompt('Your answer');
        if ($correctAnswer == $userAnswer) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
            break;
        }
    }

    if ($round === 3) {
        line("Congratulations, $name!");
    }
}
