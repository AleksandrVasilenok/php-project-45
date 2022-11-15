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
    $result = []; // переместить ближе к использованию
    $x = 2;
    $deleteli1 = []; // rename
    $deleteli2 = [];
    // вынести заполнение массивов $deleteli в отдельную функию, вызывать дважды (для первого и второго числа)
    while ($firstNumber != 1) { // строгое сравнение (везде)
        if ($firstNumber % $x === 0) {
            $firstNumber = $firstNumber / $x;
            $deleteli1[] = $x;
        } else {
            $x += 1; // через ++
        }
    }
    $x = 2;
    while ($secondNumber != 1) {
        if ($secondNumber % $x == 0) {
            $secondNumber = $secondNumber / $x;
            $deleteli2[] = $x;
        } else {
            $x += 1;
        }
    }
    if (count($deleteli1) == 1 || count($deleteli2) == 1) { // нету общего делителя, возвращает 1
        return 1;
    }

    foreach ($deleteli1 as $item) {
        // array_search до if
        // убрать in_array, проверку осуществлять по array_search
        if (in_array($item, $deleteli2)) {
            $result[] = $item;
            $search = array_search($item, $deleteli2); // rename $search
            unset($deleteli2[$search]);
        }
    }

    return array_product($result);
}

function GetRules(): callable // методы с маленькой буквы
{
    return function () {
        return "Find the greatest common divisor of given numbers.";
    };
}