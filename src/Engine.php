<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function play(string $name, callable $func, callable $getRules): void
{
    line($getRules());
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $correctAnswer = $func();
        $userAnswer = prompt('Your answer');
        if ($correctAnswer == $userAnswer) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}
