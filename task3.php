<?php
$products = [
    ['title' => 'Книга', 'price' => 500],
    ['title' => 'Рюкзак', 'price' => 2500],
    ['title' => 'Кружка', 'price' => 350],
    ['title' => 'Наушники', 'price' => 4200],
    ['title' => 'Блокнот', 'price' => 150],
];

$strings = array_map(fn($p) => "{$p['title']} — {$p['price']} руб.", $products);
echo "Список товаров:\n";
foreach ($strings as $s) echo "- $s\n";
echo "\n";

$expensive = array_filter($products, fn($p) => $p['price'] > 1000);
echo "Дороже 1000 руб.:\n";
foreach ($expensive as $p) echo "- {$p['title']}\n";
echo "\n";

$total = array_reduce($products, fn($sum, $p) => $sum + $p['price'], 0);
echo "Общая стоимость: $total руб.\n\n";

$withDiscount = array_map(fn($p) => ['title' => $p['title'], 'price' => $p['price'] * 0.85], $products);
echo "После скидки 15%:\n";
foreach ($withDiscount as $p) echo "- {$p['title']}: {$p['price']} руб.\n";