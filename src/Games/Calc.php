<?php

namespace BrainGames\Calc;

use function cli\line;

function playCalcGame(): callable
{
    return function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $mathOperator = randomMathOperator();
        line('Question: %s', $firstNumber . ' ' . $mathOperator . ' ' . $secondNumber);
        return correctAnswer($firstNumber, $secondNumber, $mathOperator);
    };
}

function correctAnswer(int $firstNumber, int $secondNumber, string $mathOperator): int
{
    if ($mathOperator == '+') {
        return  $firstNumber + $secondNumber;
    }

    if ($mathOperator == '-') {
        return $firstNumber - $secondNumber;
    }

    if ($mathOperator == '*') {
        return $firstNumber * $secondNumber;
    }

    return 0;
}

function getRules(): callable
{
    return function () {
        return 'What is the result of me expression?';
    };
}

function randomMathOperator(): string
{
    $mathOperator = ['+', '-', '*'];
    $result = array_rand($mathOperator);
    return $mathOperator[$result];
}
