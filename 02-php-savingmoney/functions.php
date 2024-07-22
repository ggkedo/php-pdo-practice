<?php

function get_input($par, $def)
{
    if(isset($_GET[$par])) {return $_GET[$par];}
    return $def;
}

function calc_savings($start, $red)
{
    $sum = $start;
    $savings = [[$start, $start]];
    $i_day = $start - $red;
    for($i=1; $i<=30 && $i_day>0; $i++)
    {
        $sum += $i_day;
        $savings[$i] = [$i_day, $sum];
        $i_day -= $red;   
    }
    return $savings;
}

function savings_table($start, $red)
{
    $table = '<table>
        <thead>
            <tr>
                <th>Nap</th>
                <th>Napi betét</th>
                <th>Összesen</th>
            </tr>
        </thead>
        <tbody>';
    
    $sum = $start;
    $i_day = $start - $red;
    $table .=  '<tr>
            <th>1.</th>
            <td>'. $start .'</td>
            <td>'. $start .'</td>
        </tr>';
    
    for($i=1; $i<=30 && $i_day>0; $i++)
    {
        $sum += $i_day;
        //$savings[$i] = [$i_day, $sum];
        $table .=  '<tr>
            <th>'. ($i+1) .'.</th>
            <td>'. $i_day .'</td>
            <td>'. $sum .'</td>
        </tr>';
        $i_day -= $red;   
    }
    
    $table .= '</tbody></table>';
    return [
        'table' => $table,
        'monthly' => $sum,
        'yearly' => 12*$sum,
    ];
}