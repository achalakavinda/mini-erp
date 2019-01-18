{{--calculate actual cv ratios--}}
<?php
$revnue = $Project->actual_revenue;
$cost = $Project->budget_cost;
$recovery_ratio = 0;
if($revnue>0 && $cost>0){
    $recovery_ratio = $revnue / $cost;
}

$CV = $Project->budget_cost - ($Project->actual_cost_by_work+$Project->actual_cost_by_overhead);
?>

<td><?php
    if($CV>0){
        echo '<span style="color: green">'.number_format($CV,2).' <i class="fa fa-arrow-up"></i></span>';
    }
    else if($CV>-1){
        echo number_format($CV,2);
    }else{
        echo '<span style="color: red">'.number_format($CV,2).' <i class="fa fa-arrow-down"></i></span>';
    }
    ?></td>
<td>{{ number_format($recovery_ratio,2) }}</td>