<?php
$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);

function bubleSort($arr)
{
    $len = count($arr);

    for ($i = 1; $i < $len; $i++) {
        for ($k = 0; $k - $i; $k++) {
            if ($arr[$k] > $arr[$k + 1]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }

    return $arr;
}

print_r(bubleSort($arr));