<?php

// Steps
//
// 1. Pick an element from the list, called a pivot.
// 2. All elements are placed before the datum. All elements that are larger than the datum are placed behind the datum. (The same number can be on either side.) After the partition exits, the datum is in the middle of the series. This is called a partition operation;
// 3. Recursive ordering the number of sub-columns smaller than the reference value element and the number of sub-columns larger than the reference value element;

function quickSort(&$arr, $left_idx = -1, $right_idx = -1)
{
    $len = count($arr);
    $left_idx = $left_idx == -1 ? 0 : $left_idx;
    $right_idx = $right_idx == -1 ? $len - 1 : $right_idx;

    $idx = partition($arr, $left_idx, $right_idx);

    if ($left_idx < $idx - 1) {
        quickSort($arr, $left_idx, $idx - 1);
    }

    if ($right_idx > $idx) {
        quickSort($arr, $idx, $right_idx);
    }

    return $arr;
}

function partition(&$arr, $left_idx, $right_idx)
{
    $pivot = $arr[($left_idx+$right_idx)/2];

    while ($left_idx <= $right_idx) {
        
        while($arr[$left_idx] < $pivot) {
            $left_idx++;
        }

        while ($arr[$right_idx] > $pivot) {
            $right_idx--;
        }

        if ($left_idx <= $right_idx) {
            $tmp = $arr[$left_idx];
            $arr[$left_idx] = $arr[$right_idx];
            $arr[$right_idx] = $tmp;
            $left_idx++;
            $right_idx--;
        }
    }

    return $left_idx;
}


$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(quickSort($arr));
