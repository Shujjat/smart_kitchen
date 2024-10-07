<?php
//echo system('notepad');

$a=array();

exec('c:/ProgramData/Anaconda3/python g:/shujjat.com/projects/smart_kitchen/AI/index.py 2>&1', $a);
var_dump($a);
exec('path', $a);
echo ($a);

?>