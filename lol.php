<?php

function rerun($stageref){

$stageref = rand(10000,99999);
if($stageref != 98481)
{$stageref;
rerun($stageref);}
echo $stageref;
}
?>
