<?php

// Steps
//
// 1. The application space is the size of the sum of the two already sorted sequences, which are used to store the merged sequence;
// 2. Set the two pointers, the initial position of the two have been sorted sequence starting position;
// 3. Compare the two pointers to the elements, select the relatively small elements into the merged space, and move the pointer to the next location;
// 4. Repeat step 3 until a pointer reaches the end of the sequence;
// 5. Copies all remaining elements of another sequence directly to the end of the merged sequence.

function mergeSort($arr)
{
    $len = count($arr);
    if ($len <= 1) return $arr;

    $middle = floor($len/2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right)
{
    $result = [];
    $left_idx = 0;
    $right_idx = 0;

    while ($left_idx < count($left) && $right_idx < count($right)) {
        
        if ($left[$left_idx] > $right[$right_idx]) {
        
            $result[] = $right[$right_idx];
            $right_idx++;
        } else {
            
            $result[] = $left[$left_idx];
            $left_idx++;
        }
    }

    while ($left_idx < count($left)) {
        
        $result[] = $left[$left_idx];
        $left_idx++;
    } 

    while ($right_idx < count($right)) {
        
        $result[] = $right[$right_idx];
        $right_idx++;
    }

    return $result;
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(mergeSort($arr));
