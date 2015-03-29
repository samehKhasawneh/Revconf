<?php
$NOS = $_POST['NumberOfSessions'];
echo $NOS;

 $chairs = array();
 $startTime = array();
 $endTime = array();


for ($i=1;$i<=$NOS;$i++)
{
    echo $_POST["chair".$i];

    echo "<br>";

    $chair['session'.$i]=$_POST["chair".$i];

    echo $chair['session'.$i];
    echo "<br>";

    echo"------";
}

?>;