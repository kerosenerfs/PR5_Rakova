<?php
$students = [
    ['name' => 'Мария', 'grade' => 4.5],
    ['name' => 'Вова', 'grade' => 3.2],
    ['name' => 'Света', 'grade' => 4.8],
    ['name' => 'Даша', 'grade' => 2.9],
];

$byGrade = $students;
usort($byGrade, fn($a, $b) => $b['grade'] <=> $a['grade']);
echo "Рейтинг по убыванию оценки:\n";
foreach ($byGrade as $s) echo "- {$s['name']}: {$s['grade']}\n";
echo "\n";

$byName = $students;
usort($byName, fn($a, $b) => strcmp($a['name'], $b['name']));
echo "По алфавиту:\n";
foreach ($byName as $s) echo "- {$s['name']}\n";
echo "\n";

$greaterThan = fn(float $limit) => fn(array $student): bool => $student['grade'] > $limit;
$top = array_filter($students, $greaterThan(4.0));

echo "Студентов с оценкой выше 4.0: " . count($top) . "\n";
foreach ($top as $s) echo "- {$s['name']}: {$s['grade']}\n";