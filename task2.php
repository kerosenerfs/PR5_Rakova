<?php
$discount = 0.9;
$applyDiscount = fn(float $price): float => $price * $discount;

echo "Цена 1000 со скидкой: " . $applyDiscount(1000) . "\n";
echo "Цена 500 со скидкой: " . $applyDiscount(500) . "\n";

$discount = 0.5;
echo "После изменения discount на 0.5: " . $applyDiscount(1000) . "\n";
// Результат не изменился, потому что fn захватывает переменные по значению в момент создания функции.
// Внутри $applyDiscount осталась копия $discount = 0.9.

$rate = 90.5;
$toRubles = fn(float $price): float => $price * $rate * $discount;

echo "100$ в рублях (со скидкой): " . $toRubles(100) . "\n";