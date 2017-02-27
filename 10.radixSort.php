<?php

// Steps
//
// 1. All the values to be compared (positive integers) are unified to the same digit length, and the digits with shorter digits are padded with zero.
// 2. Then, starting from the least significant bit, sorting is done in turn.
// 3. So that sort from the lowest bit to the highest order after the completion of the sequence becomes an orderly sequence.

function radixSort($arr){

    $count = []; $tmp = []; $radix = 1;
    $digit = maxDigit($arr);
    $len = count($arr);

    for ($i = 1; $i <= $digit; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $count[$j] = 0;
        }

        for ($j = 0; $j < $len; $j++) {
            $k = ($arr[$j] / $radix) % 10;
            $count[$k]++;
        }
        
        for ($j = 1; $j < 10; $j++) {
            $count[$j] = $count[$j-1] + $count[$j];
        }

        for ($j = $len-1; $j >= 0; $j--) {
            $k = ($arr[$j] / $radix) % 10;
            $tmp[$count[$k]-1] = $arr[$j];
            $count[$k]--;
        }

        for ($j = 0; $j < $len; $j++) {
            $arr[$j] = $tmp[$j];
        }

        $radix = $radix * 10;
    }

    return $arr;
}

function maxDigit($arr)
{
    $max = max($arr);
    $d = 1; $p = 10;

    while ($max >= $p) {
        $max /= 10;
        $d++;
    }

    return $d;
}


$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(radixSort($arr));
