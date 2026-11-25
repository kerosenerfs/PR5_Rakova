<?php
$orders = [
    ['id' => 1, 'customer' => 'Мария', 'total' => 1200, 'status' => 'done'],
    ['id' => 2, 'customer' => 'Вова', 'total' => 800, 'status' => 'new'],
    ['id' => 3, 'customer' => 'Света', 'total' => 3500, 'status' => 'done'],
    ['id' => 4, 'customer' => 'Даша', 'total' => 600, 'status' => 'cancelled'],
    ['id' => 5, 'customer' => 'Никита', 'total' => 2100, 'status' => 'done'],
];

$doneOrders = array_filter($orders, fn($o) => $o['status'] === 'done');
$revenue = array_reduce($doneOrders, fn($sum, $o) => $sum + $o['total'], 0);
echo "Выручка по выполненным заказам: $revenue руб.\n\n";

$bigOrders = array_filter($orders, fn($o) => $o['total'] > 1000);
$bigOrdersLines = array_map(fn($o) => "Заказ №{$o['id']} — {$o['total']} руб. ({$o['customer']})", $bigOrders);
echo "Заказы свыше 1000 руб.:\n";
foreach ($bigOrdersLines as $line) echo "- $line\n";
echo "\n";

$doneCopy = $doneOrders;
usort($doneCopy, fn($a, $b) => $b['total'] <=> $a['total']);
$top = $doneCopy[0];
echo "Самый дорогой выполненный: Заказ №{$top['id']} — {$top['total']} руб. ({$top['customer']})\n\n";

$customers = array_unique(array_map(fn($o) => $o['customer'], $orders));
echo "Клиенты: " . implode(', ', $customers) . "\n\n";

$total = count($orders);
$doneCount = count($doneOrders);
$cancelledCount = count(array_filter($orders, fn($o) => $o['status'] === 'cancelled'));
$totalRevenue = array_reduce($orders, fn($sum, $o) => $sum + $o['total'], 0);

echo "=== Статистика ===\n";
echo "Всего заказов: $total\n";
echo "Выполнено: $doneCount\n";
echo "Отменено: $cancelledCount\n";
echo "Общая сумма заказов: $totalRevenue руб.\n";