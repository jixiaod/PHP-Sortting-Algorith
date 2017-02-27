<?php

// Steps
//
// 1. The first element of the first sequence to be sorted is treated as an ordered sequence, and the second element to the last element is treated as an unordered sequence.
// 2. Scans an unordered sequence from beginning to end, and inserts each element scanned into place in an ordered sequence. (If the element to be inserted is equal to an element in the ordered sequence, inserts the element to be inserted after the equality element.)

function insertionSort($arr) 
{
    
    $len = count($arr);

    for ($i = 1; $i < $len; $i++) {

        $j = $i;

        while ($j > 0 && $arr[$j-1] > $arr[$j]) {
            
            // swap
            $tmp = $arr[$j-1];
            $arr[$j-1] = $arr[$j];
            $arr[$j] = $tmp;
            $j--;
        }
    }

    return $arr;
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(insertionSort($arr));
