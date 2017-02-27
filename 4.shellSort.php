<?php

// Steps 
//
// 1. Select an incremental sequence t1, t2, ..., tk, where ti> tj, tk = 1;
// 2. according to the number of incremental sequence k, the sequence k sort;
// 3. Each sort, according to the corresponding increment ti, will be ranked to be divided into a number of m-length sub-sequence, respectively, for each sub-table for direct insertion sort. When only the increment factor is 1, the entire sequence is treated as a table, and the table length is the length of the entire sequence.


function shellSort($arr) 
{
    $len = count($arr);
    $gap = 1;

    while ($gap < $len/2) {
        $gap = $gap*2 + 1;
    }

    for (; $gap > 0; $gap = floor($gap/2)) {
        for ($i = $gap; $i < $len; $i++) {
            $tmp = $arr[$i];
            for ($j = $i - $gap; $j >= 0 && $arr[$j] > $tmp; $j -= $gap) {
                $arr[$j+$gap] = $arr[$j];
            }
            $arr[$j+$gap] = $tmp;
        }
    }

    return $arr;
}

$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(shellSort($arr));
