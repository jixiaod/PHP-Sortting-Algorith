<?php

// Steps
//
// 1. First, find the smallest (large) element in the unsorted sequence and store it at the beginning of the sorting sequence
// 2. The remaining unscaled elements are then searched for the smallest (large) element and then placed at the end of the sorted sequence.
// 3. Repeat step 2 until all the elements are sorted.

function bubbleSort($arr) 
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < ($len - 1 - $i); $j++) {
            if ($arr[$j] > $arr[$j+1]) {
                $tmp = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            } 
        }
    }

    return $arr;
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(bubbleSort($arr));
