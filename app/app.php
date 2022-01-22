<?php

declare(strict_types = 1);

$rows = getData(FILES_PATH);

$income = getIncome($rows);

$expense = getExpense($rows);

$total = $income + $expense;

function getData(string $path): array {
  $rows = [];
  $dir = scandir($path);

  for ($i = 2, $length = count($dir); $i < $length; $i++) {
    $name = $dir[$i];
    if (!file_exists(FILES_PATH . $name)) continue;
    readCSVFile($rows, FILES_PATH . $name);
  }

  return $rows;
}

function readCSVFile(array &$arr, string $path) {
  $file = fopen($path, 'r');
  $firstSkipped = false;

  while (($line = fgetcsv($file)) !== false) {
    if (!$firstSkipped) {
      $firstSkipped = !$firstSkipped;
      continue;
    }
    array_push($arr, $line);
  }

  fclose($file);
}

function getIncome(array $arr): int|float {
  return array_reduce($arr, function($carry, $item) {
    $amount = (float) str_replace('$', '', $item[3]);
    if ($amount < 0) return $carry;
    return $carry + $amount;
  }, 0);
}

function getExpense(array $arr): int|float {
  return array_reduce($arr, function($carry, $item) {
    $amount = (float) str_replace('$', '', $item[3]);
    if ($amount > 0) return $carry;
    return $carry + $amount;
  }, 0);
}

echo '<pre>';
print_r($rows);
echo '</pre>';