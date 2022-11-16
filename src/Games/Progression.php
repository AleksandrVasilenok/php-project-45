<?php

namespace BrainGames\Progression;

use function cli\line;

function playProgressionGames(): callable
{
    return function () {
        $interval = rand(1, 9);
        $start = rand(1, 100);
        $progression = [];
        for ($i = 0; $i != 10; $i++) {
            $progression[] = $start;
            $start += $interval;
        }
        $randomIndexArr = array_rand($progression);
        $correctAnswer = $progression[$randomIndexArr];
        $progression[$randomIndexArr] = '..';
        $progression = implode(' ', $progression);
        line($progression);
        return $correctAnswer;
    };
}

function getRules(): callable
{
    return function () {
        return "What number is missing in the progression?";
    };
}
