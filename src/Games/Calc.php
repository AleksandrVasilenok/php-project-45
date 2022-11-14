<?php

namespace BrainGames\Calc;

use function cli\line;



function playCalcGame(): callable
{
    $rules = getRules();
    line($rules);
    return function ()
    {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $mathOperator = randomMathOperator();
        line($firstNumber . ' ' . $mathOperator . ' ' . $secondNumber);
        return correctAnswer($firstNumber, $secondNumber, $mathOperator);

    };

}

// добавить типы
function correctAnswer($firstNumber, $secondNumber, $mathOperator)
{
    if ($mathOperator == '+') {
        return  $firstNumber + $secondNumber;
    }

    if ($mathOperator == '-') {
        return $firstNumber - $secondNumber;
    }

    if ($mathOperator == '*') {
        return $firstNumber * $secondNumber;
    };

    return 0;
}


function isCorrect(): callable
{
    return function ($answer, $correctAnswer) {  // убрать в Engine
        if ($correctAnswer != $answer) {
            return false;
        } else {
            line("Correct!");
            return true;
        }
    };
}




function getRules(): string // calc
{
    return 'What is the result of me expression?';
}


function randomMathOperator(): string
{
    $mathOperator = ['+', '-', '*'];
    $result = array_rand($mathOperator);
    return $mathOperator[$result];

}

