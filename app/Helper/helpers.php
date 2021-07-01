<?php

function helperFunction($d)
{
    $actualPrice = 0;
    $pricingBracket = \App\Model\PricingBracket::orderBy('upper','ASC')->get();
    foreach($pricingBracket as $pc){
        $totalDistance = $pc->upper - $pc->lower;
        if($d >= $totalDistance){
            $actualPrice += $totalDistance * $pc->cost;
            $d -= $totalDistance;
        }elseif($d<=$totalDistance){
            $actualPrice += $d * $pc->cost;
            $d = 0;
        }elseif($d<=0){
            break;
        }
    }
    return round($actualPrice);
}

?>