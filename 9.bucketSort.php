<?php

// Steps
//
// 1. Set a quantitative array as an empty bucket.
// 2. Search sequence, and the items one by one into the corresponding bucket to go.
// 3. Sorts each bucket that is not empty.
// 4. Never put the project back into the original sequence in an empty bucket.

require_once "3.insertionSort.php";

function bucketSort(&$arr)
{
    $len = count($arr);
    $buckets = []; $sorted = [];
    $idx = 0;

    for ($i = 0;$i < $len; $i++) {
        $buckets[$i] = [];
    }

    foreach ($arr as $v) {
        array_push($buckets[ceil($v/2)], $v);
    }

    for ($i = 0; $i < $len; $i++) {
        if (!empty($buckets[$i])) {

            $sorted_buckets = insertionSort($buckets[$i]);
            foreach ($sorted_buckets as $v) {
                $sorted[] = $v;
            }
        }
    }

    return $sorted;
}


$arr = [7, 4, 1, 2, 3, 10, 9, 8, 5, 6];
var_dump(bucketSort($arr));
