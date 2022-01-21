<?php

declare(strict_types = 1);

$rows = getData(FILES_PATH);

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