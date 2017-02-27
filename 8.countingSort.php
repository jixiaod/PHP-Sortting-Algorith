<?php

// Steps
// 
// 1. Find the largest and smallest elements in the array to be sorted
// 2. The number of occurrences of each element of value i in the statistics array is stored in the ith item of array C.
// 3. For all counts (starting from the first element in C, each term is added to the previous term)
// 4. Backfill the target array: Place each element i in the C (i) entry of the new array, subtracting C (i) by one for each element

function countingSort($arr)
{
    $count = []; $sorted = [];
    $len = count($arr);
    $min = min($arr);
    $max = max($arr);

    for ($i = 0; $i < $len; $i++) {
        $count[$arr[$i]] = isset($count[$arr[$i]]) ? $count[$arr[$i]] + 1 : 1;
    }

    for ($j = $min; $j <= $max; $j++) {
        while (isset($count[$j]) && $count[$j] > 0) {
            $sorted[] = $j;
            $count[$j]--;
        }
    }

    return $sorted;
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(countingSort($arr));
