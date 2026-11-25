<?php
$square = fn(int $x): int => $x ** 2;
$isEven = fn(int $x): bool => $x % 2 === 0;
$greet = fn(string $name): string => "Привет, {$name}!";
$max = fn(int $a, int $b): int => $a > $b ? $a : $b;

echo "square(4) = " . $square(4) . "\n";
echo "square(7) = " . $square(7) . "\n\n";

echo "isEven(6) = " . ($isEven(6) ? 'true' : 'false') . "\n";
echo "isEven(9) = " . ($isEven(9) ? 'true' : 'false') . "\n\n";

echo $greet("Мария") . "\n";
echo $greet("Вова") . "\n\n";

echo "max(10, 20) = " . $max(10, 20) . "\n";
echo "max(50, 30) = " . $max(50, 30) . "\n";

/*
$square = function(int $x): int {
    return $x ** 2;
};
*/