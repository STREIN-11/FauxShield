<?php
$data="1";
$fp = fopen('status.txt', 'w');

fwrite($fp, $data);
fclose($fp);
?>