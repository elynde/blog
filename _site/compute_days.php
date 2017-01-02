<?

$day_to_count = (array)json_decode(file_get_contents('day.txt'));
$today_str = date('Y/w/d');
$times = file('log.txt');

$count = 0;
$format = 'Y/m/d';
$day_to_count_new = array();
foreach ($times as $t) {
  if (!isset($day_to_count_new[date($format, $t)])) {
   $day_to_count_new[date($format, $t)] = 0;
  }

  $day_to_count_new[date($format, $t)]++;
}

reset($day_to_count);
$first = key($day_to_count);
end($day_to_count);
$last = key($day_to_count);

while ($first != $last) {
  if (!isset($day_to_count[$first])) {
    // Missing data = no cracks (for backfilling)
    //$day_to_count[$first] = -1;

    // Now they would be no crack days! (fingers crossed)
    $day_to_count[$first] = 0;
    echo $first;
  }

  $first = date($format, strtotime("$first +1 day"));
}

file_put_contents('day.txt',json_encode(array_merge($day_to_count, $day_to_count_new)));
