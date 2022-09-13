<?php
function getTimeSlot($interval,$start_time,$end_time)
{
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    $startTime = $start->format('H:i');
    $endTime =$end->format('H:i');
    $i = 0;
    $time = [];

    while(strtotime($startTime) <= strtotime($endTime)){
        $start = $startTime;
        $end = date('H:i',strtotime('+'.$interval.'minutes',strtotime($startTime)));

        $startTime = date('H:i',strtotime('+'.$interval.'minutes',strtotime($startTime)));

        $i++;

        if(strtotime($startTime)<= strtotime($endTime)){
              $time[$i] ['slot_start_time'] = $start;
              $time[$i] ['slot_end_time'] = $end;
        }
    }

return $time;

}


$slots = getTimeSlot(30, '10:00', '13:00');
echo '<pre>';
print_r($slots);
?>

