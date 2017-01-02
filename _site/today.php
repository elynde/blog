<?

function today() {
  $today_str = date('Y/w/d');
  $times = file('log.txt');

  $count = 0;
  foreach ($times as $t) {
    if (date('Y/w/d', (int)$t) == $today_str) {
      $count++;
    }
  }

  return $count;
}

echo today();
