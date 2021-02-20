<?php

$int1 = readline('Integer 1: ');
$int2 = readline('Integer 2: ');

echo $int1 == 15 || $int2 == 15 || $int1 + $int2 === 15 || abs($int2 - $int1) === 15 ? 'true' : 'false';
// kaut kādu iemeslu dēļ ar === neiet