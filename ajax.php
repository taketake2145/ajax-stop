<?php
$fp = fopen('test.txt', 'w');
for ($i = 0; $i < 5; $i++) {
  @fwrite($fp, 'A'.$i);
  sleep(1);
  print('A'.$i);    
}
fclose($fp);
