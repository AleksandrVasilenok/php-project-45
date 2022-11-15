<?php

namespace BrainGames\Gcd;

use function cli\line;

function playGamesGcd(): callable
{
    return function () {
        $firstNumber = rand(10, 100);
        $secondNumber = rand(10, 100);
        line("$firstNumber $secondNumber");
        return correctAnswer($firstNumber, $secondNumber);
    };
}

function correctAnswer(int $firstNumber, int $secondNumber): int
{
    $multiplierFirstNumber  = getMultiplierNumbers($firstNumber);
    $multiplierSecondNumber = getMultiplierNumbers($secondNumber);
    $result = [];
    foreach ($multiplierFirstNumber as $item) {
        $search = array_search($item, $multiplierSecondNumber);
        if ($search !== false) {
            $result[] = $item;
            unset($multiplierSecondNumber[$search]);
        }
    }

    return array_product($result);
}

function getRules(): callable // методы с маленькой буквы
{
    return function () {
        return "Find the greatest common divisor of given numbers.";
    };
}

function getMultiplierNumbers($number): array
{
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

    return $multiplierNumbers;
}
