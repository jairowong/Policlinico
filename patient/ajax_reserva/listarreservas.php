<?php

include("../../connection.php");

$dte_now = date('Y-m-d');
$sqlQueryStr = "select * from schedule a inner join appointment b on a.scheduleid=b.scheduleid inner join patient c on c.pid=b.pid
inner join doctor d on a.docid=d.docid where c.pid=72772951 and a.scheduledate>='$dte_now' order by a.scheduledate asc ";
$sqlreserva = $database->query($sqlQueryStr);


$myArray = [];

for ($y = 0; $y < $sqlreserva->num_rows; $y++) {
   
    $row00 = $sqlreserva->fetch_assoc();
    
    $fecha_ = $row00['scheduledate'] . " " . $row00['scheduletime'];

    $colordef = '#198754';


    array_push($myArray, (object)[
        'id' => $row00['appoid'],
        'title' => $row00['title'],
        'med' => $row00['docname'],
        'pac' => $row00['pname'],
        'start' =>  $fecha_,
        'end' =>  $fecha_,
        'color' =>  $colordef
    ]);
}
echo  json_encode($myArray);
