<?php

// Steps
//
// 1. Create a heap H [0..n-1];
// 2. The heap (the maximum) and heap swap;
// 3. The size of the heap reduced by 1, and call shift_down (0), the purpose is to adjust the data to the new array of the top position;
// 4. Repeat step 2 until the heap size is 1.

function heapSort(&$arr)
{
    $len = count($arr);
    heapify($arr, $len);
    $end = $len - 1;

    while ($end > 0) {
        $tmp = $arr[0];
        $arr[0] = $arr[$end];
        $arr[$end] = $tmp;
        $end--;
        siftDown($arr, 0, $end);
    }
    
    return $arr;
}

function heapify(&$arr, $len)
{
    $start = floor(($len - 2) / 2);

    while ($start >= 0) {
        siftDown($arr, $start, $len - 1);
        $start--;
    }
}

function siftDown(&$arr, $start, $end)
{
    $root = $start;
    while ($root * 2 +1 < $end) {
        $left = $root * 2 + 1;
        $swap = $root;

        //check who is the bigger between root,left child and right child.
        if ($arr[$swap] < $arr[$left]) {
            $swap = $left;
        }

        if ($left + 1 <= $end && $arr[$swap] < $arr[$left+1]) {
            $swap = $left + 1;
        }

        // swap root with bigger children (if exist)
        if ($swap != $root) {

            $tmp = $arr[$root];
            $arr[$root] = $arr[$swap];
            $arr[$swap] = $tmp;
            $root = $swap;

        } else {
            return;
        }
    }
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(heapSort($arr));
