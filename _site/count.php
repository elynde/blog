<?

$key = file_get_contents('/home/elynde/secret.txt');
if (trim($_GET['write']) == trim($key)) {
  file_put_contents('log.txt', time()."\n", FILE_APPEND);
}

require 'today.php';
