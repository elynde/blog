<?
require 'compute_days.php';

$days = json_decode(file_get_contents('day.txt'));

$csv = '';
foreach ($days as $d => $c) {
  $csv .= "$d,$c\r\n";
}

echo $csv;
