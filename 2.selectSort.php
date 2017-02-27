<?php

// Steps
//
// 1. Compare adjacent elements. If the first one is bigger than the second one, swap them both.
// 2. Do the same for each pair of adjacent elements, starting from the first pair to the last pair at the end. After this step is done, the last element will be the largest number.
// 3. Repeat the above steps for all elements, except for the last one.
// 4. Keep repeating the above steps for fewer and fewer elements at a time until none of the pair of numbers needs to be compared.

function selecttionSort($arr) 
{
    $len = count($arr);
    
    for ($i = 0; $i < $len -1 ; $i++) {

        $min_idx = $i;
        for ($j = $i+1; $j < $len; $j++) {
            
            if ($arr[$j] < $arr[$min_idx]) {
                $min_idx = $j;
            } 
        }

        if ($min_idx != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min_idx];
            $arr[$min_idx] = $tmp;
        }
    }

    return $arr;
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(selecttionSort($arr));

